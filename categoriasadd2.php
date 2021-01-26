<?php
if(isset($_POST["submit"])){
      $cat=$_POST['submit'];
     }
    $host=$_SERVER["HTTP_HOST"];
    $db="manga";
    $user="root";
    $contra="admin";

    $conexion=mysqli_connect($host,$user,$contra);
    mysqli_connect_errno() && exit();
    
    mysqli_select_db($conexion,$db) or die("ocurrio un error");
    mysqli_set_charset($conexion,"utf8");

    $consulta="select * from informacion";

    $respuesta=mysqli_query($conexion,$consulta);
    echo "<div class='contenedor_categoria'>
           <h3 class='titulo_categoria'>Categorias</h3>
           <ul class='categorias'>";
    $aux="";
    while($array=mysqli_fetch_array($respuesta,MYSQLI_ASSOC)){
    	  $copia= explode(",",$array['Categorias']);
    	  
    	   foreach ($copia as $copias){
    	        if(strpos($aux, $copias)===false){
    	        	$aux.=" ".$copias;
    	        	echo "<li><form action='categorias2.php' method='post'><button type='submit' name='submit' value='$copias'>$copias</button></form></li>";
    	        }  
    	    }  
    }
    echo "   </ul>
          </div>";

          $cont=0;
      $consulta="select * from informacion where Categorias like'%$cat%'";

      $respuesta=mysqli_query($conexion,$consulta);
 
    echo "<div class='contenedor_grid_categorias'>";

       while($array=mysqli_fetch_array($respuesta,MYSQLI_ASSOC)){
       	$cont++;
       	     echo "<div>
       	             <form action='info.php' method='post'>
       	               <button type='submit' name='submit'> 
                       <img src='imagenes/espacio.png'alt='' name='nombre'>
           <input type='text' name='parrafo' value='$array[Titulo]' readonly='readonly'>
       </button>
       	             </form>
       	           </div>";
       }
    echo "</div>";
    
    $botones=ceil($cont/20);
    echo "<div class='pagina_categoria'>
        	<button><</button><button><<</button>
        	<div class='numero_pagina'>";
       for ($i=0; $i < $botones; $i++) { 
       	 echo "<button>".($i+1)."</button>";
       }
         

      echo "</div>
           <button>>></button><button>></button>
        </div>";

?>