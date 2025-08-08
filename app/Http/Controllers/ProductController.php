<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;

class ProductController extends Controller
{
    public function listProduct(){
        return view('frontend.list_product');
    }

    public function products()
    {
        $list_product = Product::all(); 
        $categories = Category::all();
        return view('frontend.list_product', compact('list_product', 'categories'));
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $list_product = Product::where('name', 'like', "%$keyword%")
                            ->orWhere('description', 'like', "%$keyword%")
                            ->get();

        $categories = Category::all();

        return view('frontend.list_product', compact('list_product', 'categories'));
    }

    public function searchCate(Request $request) {
        $query = Product::query();

        if ($request->has('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->has('category')) {
            $query->whereIn('category_id', $request->category);
        }

        $list_product = $query->get();

        $categories = Category::all(); 

        return view('frontend.list_product', compact('list_product', 'categories'));
    }
}
