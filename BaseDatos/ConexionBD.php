<?php

class ConexionBD {
    
    private $servidor = 'localhost';
    private $usuario = 'librito';
    private $password = '123456';
    private $baseDatos = 'libreria'; 
    private $coneccion;
    
    public function __construct() {         
       if($this->coneccion == null){
           $this->abrirConeccion();
       }
    }
    
    private function abrirConeccion(){
      $this->coneccion = mysqli_connect($this->servidor,$this->usuario,$this->password,$this->baseDatos);
      mysqli_query($this->coneccion, "SET NAMES 'utf8'");
      if(mysqli_connect_errno()){
            echo 'Error en la conexión con la BD: ' . mysqli_connect_err().'<br>';
      }
    }
    
    //Método que obtiene la conección
    public function getConeccion(){        
        if($this->coneccion == null){
            abrirConeccion();
        }
      return $this->coneccion;
    }
    
    // Método que ejecuta todos los SELECT
    public function executeQueryReturnData($sql) {
       $registros = array();
       $resultado = $this->coneccion->query($sql);   

       while($row = mysqli_fetch_assoc($resultado)){
          array_push($registros, $row);
       }       
       return $registros;
   }
   
   // Método es para todos los INSERT, UPDATE, DELETE
   // $sql = 'INSERT INTO USUARIO(CORREO,PASSWORD) VALUES(?,?)';
   public function executeQuery($sql, $param_type, $paramValue) {
        $stmt = $this->coneccion->prepare($sql);
        $arrayValues = $this->bindQueryParams($param_type, $paramValue);
        call_user_func_array(array($stmt, 'bind_param'), $arrayValues);
        $stmt->execute();
        $stmt->close();       
    }  
    
    private function bindQueryParams($param_type, $param_value_array) {
        $param_value_reference[] = $param_type;
        for($i=0; $i<count($param_value_array); $i++) {
            $param_value_reference[] = $param_value_array[$i];
        }
        return $param_value_reference;
    }    
    
   // Cerrar la conección 
   public function cerrarConeccion(){
       $this->coneccion->close();
   }
    
}
