let cartIcon = document.querySelector('.fa-solid.fa-cart-shopping.cart__head');
let cart = document.querySelector('.cart');
let closeCart = document.querySelector('#close-cart');

// Open cart
cartIcon.onclick = () => {
    cart.classList.add("active");
};

// Close cart
closeCart.onclick = () => {
    cart.classList.remove("active");
};
// Hàm chọn kích thước sản phẩm
function selectBox(element) {
    var boxes = document.querySelectorAll(".size-item");
    boxes.forEach(function (box) {
        box.classList.remove("selected");
    });
    element.classList.add("selected");
}

// Hàm thêm sản phẩm vào giỏ hàng
function addToCart(idSP) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../sp/add_to_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert("Sản phẩm đã được thêm vào giỏ hàng!");
            updateCart(); // Cập nhật giỏ hàng sau khi thêm sản phẩm
        } else {
            alert("Có lỗi xảy ra!");
        }
    };
    xhr.send("idSP=" + encodeURIComponent(idSP));
}

// Cập nhật giỏ hàng
function updateCart() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../sp/get_cart.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var cartContent = document.querySelector('.cart-content');
            cartContent.innerHTML = xhr.responseText;
            calculateTotal();
        } else {
            console.error("Có lỗi khi tải giỏ hàng.");
        }
    };
    xhr.send();
}

// Tính tổng giá
function calculateTotal() {
    var totalPrice = 0;
    document.querySelectorAll('.cart-box').forEach(function (box) {
        var priceElement = box.querySelector('.cart-price span');
        var quantityElement = box.querySelector('.cart-quantity');

        if (priceElement && quantityElement) {
            var price = parseFloat(priceElement.innerText.replace(',', '.'));
            var quantity = parseInt(quantityElement.value);
            totalPrice += price * quantity;
        }
    });

    document.getElementById('total-price').innerText = totalPrice.toLocaleString();
}

// Đóng giỏ hàng khi nhấn vào nút đóng
document.getElementById('close-cart').addEventListener('click', function () {
    document.getElementById('cart').classList.remove('active');
});

// Mở/đóng giỏ hàng khi nhấn vào biểu tượng giỏ hàng
document.querySelector('.cart__head').addEventListener('click', function () {
    document.getElementById('cart').classList.toggle('active');
});
