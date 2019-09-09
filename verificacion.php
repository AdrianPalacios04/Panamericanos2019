<?php
$usuario=$_POST['username'];
$clave=$_POST['password'];
$conexion=mysqli_connect("localhost","root","","heroku");
$consulta="select * from login where username='$usuario' and password='$clave'";//seleccion que debe ser verdadera 
$resultado=mysqli_query($conexion,$consulta);//ejecuta 
$fila=mysqli_num_rows($resultado);
if ($fila > 0 ) {  //si consigue un dato
	header("location:depor.php");
}else{
	header("localtion:login.php");
}
?>