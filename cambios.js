const menu_aplicado=document.getElementById("menu_aplicado");
document.getElementById("menu").addEventListener("click", (e)=>{
     menu_aplicado.classList.toggle("active");
     menu_aplicado.style.transition = '.7s';
})

// index.html
let recomendacion=document.getElementById("recomendacion");
function index(){
	fetch("informacion.json")
    .then(res=>res.json())
    .then(res=>{
	 let fragmento=document.createDocumentFragment();
	 for(let mangas in res.manga){
		agregar=document.createElement("div");
		agregar.innerHTML=`<a href='info.html'>
						   <img src='${res.manga[mangas].imagen}' alt=''>
						   <p>${res.manga[mangas].titulo}</p>
						   </a>`;
       fragmento.appendChild(agregar); 
	 }
	   recomendacion.appendChild(fragmento);      
    }).catch(e=>console.log(e));
}
// info.html
let info_imagen=document.getElementById("info_imagen");
hijos= recomendacion.children;
console.log(hijos.length)


