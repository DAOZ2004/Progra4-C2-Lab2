<?php 
     
   $host  = "localhost";
   $user  = "root";
   $pass  = "";
   $db    = "lab2-c2";

   try{
    $conn = new mysqli($host,$user,$pass,$db);

  }
  catch(Error $e){
     die("Conexion fallida: ".$conn->connect_error);
  }


?>