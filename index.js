let menu_aplicado=document.getElementById("menu_aplicado");
document.getElementById("menu").addEventListener("click", ()=>{
     menu_aplicado.classList.toggle("active");
     menu_aplicado.style.transition = '.7s';
})