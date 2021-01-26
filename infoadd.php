<?php
    

    
    $host=$_SERVER["HTTP_HOST"];
    $db="manga";
    $user="root";
    $contra="admin";

    $conexion=mysqli_connect($host,$user,$contra);
    $parrafo;
      if(isset($_POST["submit"])){
    	    global $parrafo;
            $parrafo=mysqli_real_escape_string($conexion,$_POST["parrafo"]);
       }
    if(mysqli_connect_errno()){
    	exit();
    }

    mysqli_select_db($conexion,$db);
    mysqli_set_charset($conexion,"utf8");
    $consulta="select * from informacion where Titulo='$parrafo'";
    $resultado=mysqli_query($conexion,$consulta);
     $fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC);
     
     $categoria=explode(",",$fila['Categorias']);

     $categorias="";         
     for($i=0;$i<count($categoria);$i++){
     	$categorias.="<li><form action='categorias2.php' method='post'><button type='submit' name='submit' value='$categoria[$i]'>$categoria[$i]</button></form></li>";
     }

     echo"<div class='contenedor_info'>
    	 <div class='portada' id='info_imagen'>
    	   <img src='imagenes/espacio.png'>
    	 </div>
    	 <div class='sinopsis' id='sinopsis'>
    	 	<p>$fila[Informacion]</p>
    	 </div>
    	 <div class='contenedor_categoria'>
	        <ul class='categorias'>
				$categorias
		    </ul>
        </div>
    </div>";
     
     echo "<div class='contenedor_capitulos'>
    	<div>
    		<p class='episodio'>01</p>
    		<div>
    			<p class='lectura'>></p><p class='visto'>0</p>
    		</div>
    	</div>
    </div>";
    mysqli_close($conexion);
?>
