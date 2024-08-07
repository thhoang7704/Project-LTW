const btn = document.querySelectorAll(".each-item .img .icon .fa-solid.fa-cart-shopping")
// console.log(btn)

btn.forEach(function(button,index){
    // console.log(button,index)
    button.addEventListener('click',function(event){
        var btnItem = event.target
        var prevProduct = btnItem.parentElement
        var ppProduct = prevProduct.parentElement
        var product = ppProduct.parentElement
        
        var productImg = product.querySelector(".img-item").src
        var productName = product.querySelector(".name-item").innerText
        var productPrice = product.querySelector(".cost-item span").innerText
        // console.log(productPrice)
        addCart(productPrice,productImg,productName)
    })
})
function addCart(productPrice,productImg,productName){
    var addtr = document.createElement("tr")
    var trcontent = '<tr><td style="display: flex; align-items: center; padding: 0px;"><img src="'+productImg+'" alt="" />'+productName+'</td><td><p><span>'+productPrice+'</span></p></td><td><input type="number" value="1" min="1" /></td><td class="xoa-btn">Xóa</td></tr>'
    addtr.innerHTML = trcontent
    var cartTable = document.querySelector("tbody")
    // console.log(cartTable)
    cartTable.append(addtr)

    carttotal()
}
// total 
function carttotal(){
    var cartItem = document.querySelectorAll("tbody tr")
    var totalC = 0;
    // console.log(cartItem.length)
    for(var i = 0; i < cartItem.length; i++){
        var inputValue = cartItem[i].querySelector("input").value  
        var price =  cartItem[i].querySelector("span").innerText
        totalA = inputValue*price*1000
        // totalB = totalA.toLocaleString('de-DE')
        totalC = totalC + totalA
        totalD = totalC.toLocaleString('de-DE')
        // console.log(inputValue)
        // console.log(price)
        

    }
    var cartTotalA = document.querySelector(".price-total span")
    cartTotalA.innerHTML = totalD
    // console.log(cartTotalA)
}
