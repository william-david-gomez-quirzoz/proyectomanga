const menu_aplicado=document.getElementById("menu_aplicado");
document.getElementById("menu").addEventListener("click", (e)=>{
     menu_aplicado.classList.toggle("active");
     menu_aplicado.style.transition = '.7s';
})
