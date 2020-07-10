<?php

class ConexionBD {
    
    private $servidor = 'localhost';
    private $usuario = 'librito';
    private $password = '123456';
    private $baseDatos = 'libreria'; 
    private $coneccion;
    
    public function __construct() {                
      $this->coneccion = mysqli_connect($servidor, $usuario, $password, $baseDatos);
      mysqli_query($conexion, "SET NAMES 'utf8'");
      if(mysqli_connect_errno()){
            echo 'Error en la conexión con la BD: ' . mysqli_connect_err().'<br>';
      }
    }
    
    
}
