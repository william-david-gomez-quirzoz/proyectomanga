<?php
$host="localhost";
$db="manga";
$user="root";
$contra="admin";
$conexion=mysqli_connect($host,$user,$contra);
if(mysqli_connect_errno()){
   exit();
}
mysqli_select_db($conexion,$db) or die("Ocurrio un error");
mysqli_set_charset($conexion,"utf8");
$consulta="select Titulo from informacion";
$respuesta=mysqli_query($conexion,$consulta);
echo "<div class='contenedor_recomendaciones' id='recomendacion'>";
while($fila=mysqli_fetch_array($respuesta)){
	echo "<div> 
	         <form action='info.php' method='post'>
	         <button type='submit' name='submit'> 
	         <img src='imagenes/espacio.png'alt='' name='nombre'>
	         <input type='text' name='parrafo' value='$fila[Titulo]' readonly='readonly'>
			 </button>		   
			</form>
		  </div>";
}
 echo "</div>";
   
   mysqli_close($conexion);
?>