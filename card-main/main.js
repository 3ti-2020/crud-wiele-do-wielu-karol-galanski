const content = document.querySelector(".content");
const desc = document.querySelector(".description");

content.addEventListener('mouseenter', function(){
    desc.style.display = "block";
    desc.style.animation = "scale-up-bottom 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both";
} );
content.addEventListener('mouseleave', function(){
    desc.style.display = "none";
} );


const btnBuy = document.querySelector(".buy");
const price = document.querySelector(".price");
const btnClose = document.querySelector(".close");
const after = document.querySelector(".buy-after");

btnBuy.addEventListener("click", function(){
    after.style.animation = "slidebot 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both";
    after.style.display = "flex";
    btnBuy.style.zIndex = "0";
    price.style.zIndex = "0";
});
btnClose.addEventListener("click", function(){
    after.style.display = "none";
    btnBuy.style.zIndex = "1";
    price.style.zIndex = "1";
});