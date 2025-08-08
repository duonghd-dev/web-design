document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".category-filter");
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener("change", function () {
            document.getElementById("filterForm").submit();
        });
    });

    const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
    const notifyBox = document.getElementById("notification-box");

    function showNotification(message, type = "success") {
        if (!notifyBox) return;

        notifyBox.style.opacity = "0";
        notifyBox.style.transform = "translateY(-20px)";

        setTimeout(() => {
            notifyBox.innerText = message;
            notifyBox.className = "";
            notifyBox.classList.add("notification-box", type);

            notifyBox.style.opacity = "1";
            notifyBox.style.transform = "translateY(0)";

            setTimeout(() => {
                notifyBox.style.opacity = "0";
                notifyBox.style.transform = "translateY(-20px)";
            }, 3000);
        }, 300);
    }

    addToCartButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const productId = this.getAttribute("data-id");

            fetch("/cart/add", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1,
                }),
            })
                .then(async (response) => {
                    const contentType = response.headers.get("content-type");

                    if (
                        contentType &&
                        contentType.includes("application/json")
                    ) {
                        const data = await response.json();

                        if (response.ok) {
                            showNotification(data.message, "success");
                        } else {
                            showNotification(
                                data.message || "An error occurred.",
                                "error"
                            );
                        }
                    } else {
                        throw new Error(
                            "Invalid response. You may not be logged in."
                        );
                    }
                })
                .catch((error) => {
                    console.error("Error adding to cart:", error);
                    showNotification("Error: " + error.message, "error");
                });
        });
    });
});
