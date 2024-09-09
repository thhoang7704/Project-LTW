// Variables
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

// // Wait for the DOM to be fully loaded
// if (document.readyState == 'loading') {
//     document.addEventListener('DOMContentLoaded', ready);
// } else {
//     ready();
// }

// // making function
// function ready(){
//     //remove items from cart
//     // quantity changes
//     //add to cart 
//     if (btn) {
//         btn.addEventListener('click', function(event) {
//           var btnItem = event.target;
//           var preProduct = btnItem.parentElement;
//           var ppProduct = preProduct.parentElement;
//           var product = ppProduct.parentElement;
//           var imgElement = product.querySelector('.img');
//           if (!imgElement) {
//             console.error("Element with class '.img' not found in product!");
//           } else {
//               var productImg = imgElement.src;
//               console.log("Product image source:", productImg);
//           }
//           var productName = product.querySelector('.name-item').innerText;
//           var productPrice = product.querySelector('.cost span').innerText;
//         //   console.log(productImg, productName, productPrice);
//           addCartClicked(productImg, productName, productPrice);
//         })
//       } else {
//         console.error("Element with class '.add' not found!");
//       }
// }

// function removeCartItem() {
//     document.querySelectorAll('.cart-remove').forEach(button => {
//         button.addEventListener('click', function(event) {
//             let cartItem = event.target.closest('.cart-box');
//             let productName = cartItem.querySelector('.ten').innerText;

//             // Remove product from local storage
//             let cartData = JSON.parse(localStorage.getItem('cart'));
//             let updatedCart = cartData.filter(item => item.productName !== productName);
//             localStorage.setItem('cart', JSON.stringify(updatedCart));

//             cartItem.remove();
//             cartTotal();
//         });
//     });
// }

// function quantityChanged() {
//     document.querySelectorAll('.cart-quantity').forEach(input => {
//         input.addEventListener("change", function() {
//             cartTotal();
//         });
//     });
// }

// function addCartClicked(productImg, productName, productPrice) {
//     let addcart = document.createElement('div');
//     addcart.className = 'cart-box';
    
//     // Check if product is already in cart
//     let cartItems = document.querySelectorAll('.cart-content .cart-box');
//     let productFound = Array.from(cartItems).some(item => 
//         item.querySelector('.ten').innerText.trim() === productName.trim()
//     );

//     if (!productFound) {
//         let content = `
//             <div class="cart-box" style="display: grid; grid-template-columns: 32% 50% 18%; align-items: center; gap: 1rem; margin-top: 1rem;">
//                 <img src="${productImg}" alt="" class="cart-img" style="width: 100px; height: 100px; object-fit: contain; padding: 10px;">
//                 <div class="detail-box" style="display: grid; row-gap: 0.5rem;">
//                     <div class="cart-product-title" style="font-size: 1rem; text-transform: uppercase;">
//                         <span class="ten">${productName}</span>
//                     </div>
//                     <div class="cart-price" style="font-weight: 500;">
//                         <span class="gia">${productPrice}</span><sup>đ</sup>
//                     </div>
//                     <input type="number" value="1" min="1" class="cart-quantity" style="border: 1px solid #ddd; outline-offset: 5px; width: 30px; text-align: center; font-size: 1rem;">
//                 </div>
//                 <i class="fa-solid fa-trash cart-remove" style="font-size: 24px; cursor: pointer;"></i>
//             </div>
//         `;
//         addcart.innerHTML = content;

//         document.querySelector('.cart-content').append(addcart);

//         console.log("Added product:", productName);

//         cartTotal();    
//         removeCartItem();
//         saveCartToLocalStorage();
//     } else {
//         console.log("Product already in cart.");
//     }
// }

// function cartTotal() {
//     let cartItems = document.querySelectorAll('.cart-content .cart-box');
//     let total = 0;

//     cartItems.forEach(item => {
//         let quantity = item.querySelector('.cart-quantity').value;
//         let priceText = item.querySelector('.gia').innerText.replace(/,/g, '');
//         let price = parseFloat(priceText);
//         total += quantity * price * 1000; // Ensure to calculate total correctly
//     });

//     document.querySelector('.total-price').innerHTML = total.toLocaleString('de-DE') + "đ";
//     quantityChanged();
// }

// function saveCartToLocalStorage() {
//     let cartItems = document.querySelectorAll('.cart-content .cart-box');
//     let cartData = [];
//     cartItems.forEach(item => {
//         let productImg = item.querySelector('.cart-img').src;
//         let productName = item.querySelector('.ten').innerText;
//         let productPrice = item.querySelector('.gia').innerText;
//         let quantity = item.querySelector('.cart-quantity').value;
//         cartData.push({ productImg, productName, productPrice, quantity });
//     });
//     localStorage.setItem('cart', JSON.stringify(cartData));
// }

// function loadCartFromLocalStorage() {
//     const cartData = JSON.parse(localStorage.getItem('cart'));
//     if (!cartData) return;
//     cartData.forEach(item => {
//       addCartClicked(item.productImg, item.productName, item.productPrice);
//     });
//   }
  
//   if(document.readyState == 'loading'){
//     document.addEventListener('DOMContentLoaded', () => {
//       loadCartFromLocalStorage();
//       ready();
//     });
//   } else {
//     ready();
//   }