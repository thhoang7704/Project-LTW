// cart
let cartIcon = document.querySelector('.fa-solid.fa-cart-shopping.cart__head')
let cart = document.querySelector('.cart')
let closeCart = document.querySelector('#close-cart')
const btn = document.querySelectorAll('.icon .fa-solid.fa-cart-shopping')
// console.log(btn)
// open cart
cartIcon.onclick = () => {
    cart.classList.add("active")
}
// close cart
closeCart.onclick = () => {
    cart.classList.remove("active")
}

// cart working js
if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
}
else{
    ready();
}

// making function
function ready(){
    //remove items from cart
    // quantity changes
    //add to cart
    btn.forEach(function(button,index){
        button.addEventListener('click',function(event){
            var btnItem = event.target
            var preProduct = btnItem.parentElement
            var ppProduct = preProduct.parentElement
            var product = ppProduct.parentElement
            var productImg = product.querySelector('.img-item').src
            var productName = product.querySelector('.name-item').innerText
            var productPrice = product.querySelector('.cost-item span').innerText
            // console.log(productImg,productName,productPrice)
            addCartClicked(productImg,productName,productPrice)
        })
    })
}
function removeCartItem() {
    var cartItem = document.querySelectorAll('.cart-content .cart-box')
    for(var i = 0; i< cartItem.length; i++){
        var productT = document.querySelectorAll('.cart-remove')
        productT[i].addEventListener('click', function(event){
            var cartDelete = event.target
            var cartitems = cartDelete.parentElement
            const productName = cartitems.querySelector('.ten').innerText;

            // Xóa sản phẩm khỏi Local Storage
            const cartData = JSON.parse(localStorage.getItem('cart'));
            const updatedCart = cartData.filter(item => item.productName !== productName);
            localStorage.setItem('cart', JSON.stringify(updatedCart));
            cartitems.remove()
            cartTotal()
        })  
    }
    
}
// quantity changes function
function quantityChanged() {
    var cartItem = document.querySelectorAll('.cart-content .cart-box')
    for(var i = 0; i< cartItem.length; i++){
        var input = cartItem[i].querySelector('.cart-quantity')
        input.addEventListener("change", function(){
            cartTotal()
        })
    }
}
// add to cart function
function addCartClicked(productImg,productName,productPrice) {
    var addcart = document.createElement('div')
    var cartItem = document.querySelectorAll('.cart-content .cart-box')
    let productFound = false;
    for(var i = 0; i< cartItem.length; i++){
        var productT = document.querySelectorAll('.ten')
        if(productT[i].innerHTML.trim() == productName.trim()){
            // alert("Sản phẩm đã có trong giỏ hàng")
            productFound = true; // Set flag to true if product found
            break;
        }
    }
    // addcart.className = 'cart-box'  
    if (!productFound) {
    // ... existing code to create cart item element ...
    var content = '<div class="cart-box" style="display: grid;grid-template-columns: 32% 50% 18%;align-items: center;gap: 1rem;margin-top: 1rem;"><img src="'+productImg+'" alt="" class="cart-img" style="width: 100px;height: 100px;object-fit: contain;padding: 10px;"><div class="detail-box" style="display: grid;row-gap: 0.5rem;"><div class="cart-product-title" style="font-size: 1rem;text-transform: uppercase;"><span class="ten">'+productName+'</span></div><div class="cart-price" style="font-weight: 500;"><span class="gia">'+productPrice+'</span><sup>đ</sup></div><input type="number" value="1" min="1" class="cart-quantity" style="border: 1px solid var(--text-color);outline-offset: var(--main-color);width: 30px;text-align: center; font-size: 1rem;"></div><i class="fa-solid fa-trash cart-remove" style="font-size: 24px;cursor: pointer;"></i></div>';
    addcart.innerHTML = content;

    var cart = document.querySelector('.cart-content');
    cart.append(addcart);

    console.log("Added product:", productName); // Log only if added

    cartTotal();    
    removeCartItem();
    saveCartToLocalStorage();
  }
}
// update total
// total price
function cartTotal(){
    var cartItem = document.querySelectorAll('.cart-content .cart-box')
    var totalC = 0;
    // console.log(cartItem)
    for(var i = 0; i< cartItem.length; i++){
        var inputValue = cartItem[i].querySelector('input').value    
        var productPrice = cartItem[i].querySelector('.gia').innerText
        totalA = inputValue*productPrice*1000
        
        totalC = totalC + totalA
        console.log(totalC)
    }
    var cartTotalA = document.querySelector('.total-price')
    cartTotalA.innerHTML = totalC.toLocaleString('de-DE') + "đ"
    quantityChanged()
}
function saveCartToLocalStorage() {
    const cartItems = document.querySelectorAll('.cart-content .cart-box')
    const cartData = [];
    cartItems.forEach(item => {
      const productImg = item.querySelector('.cart-img').src;
      const productName = item.querySelector('.ten').innerText;
      const productPrice = item.querySelector('.gia').innerText;
      const quantity = item.querySelector('.cart-quantity').value;
      cartData.push({ productImg, productName, productPrice, quantity });
    });
    localStorage.setItem('cart', JSON.stringify(cartData));
  }
function loadCartFromLocalStorage() {
    const cartData = JSON.parse(localStorage.getItem('cart'));
    if (!cartData) return;
    cartData.forEach(item => {
      addCartClicked(item.productImg, item.productName, item.productPrice);
    });
  }
  
  if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', () => {
      loadCartFromLocalStorage();
      ready();
    });
  } else {
    ready();
  } 