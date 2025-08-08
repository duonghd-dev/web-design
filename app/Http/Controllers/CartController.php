<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $shippingFee = 2;
        $grandTotal = $subtotal + $shippingFee;

        return view('frontend.cart', compact('cartItems', 'subtotal', 'shippingFee', 'grandTotal'));
    }

    public function add(Request $request)
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Please log in to add products to the cart.'
            ], 401);
        }

        $product = Product::findOrFail($request->product_id);

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => $request->input('quantity', 1),
                'price' => $product->price,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product has been added to the cart!'
        ]);
    }


    public function update(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->findOrFail($id);
        $quantity = $request->input('quantity');

        if ($quantity > 0) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Cart has been updated!');
    }

    public function remove($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Product has been removed from the cart!');
    }


    public function merge(Request $request)
    {
        if (Auth::check() && Session::has('cart')) {
            $cart = Session::get('cart', []);
            foreach ($cart as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $item['product_id'])
                        ->first();

                    if ($cartItem) {
                        $cartItem->quantity += $item['quantity'];
                        $cartItem->save();
                    } else {
                        Cart::create([
                            'user_id' => Auth::id(),
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'price' => $item['price'],
                        ]);
                    }
                }
            }
            Session::forget('cart');
            return response()->json(['success' => true, 'message' => 'Cart has been merged!']);
        }

        return response()->json(['success' => false, 'message' => 'No cart to merge.']);
    }

    public function checkAuth(Request $request)
    {
        return response()->json(['authenticated' => Auth::check()]);
    }
}