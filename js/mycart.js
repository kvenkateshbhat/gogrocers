var addToCart = document.querySelector(".price");
var item = document.querySelector(".item_wrap");

addToCart.addEventListener("click",function(){
	item.classList.toggle("active");
})