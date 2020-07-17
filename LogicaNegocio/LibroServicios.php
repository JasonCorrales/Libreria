<?php
// ../ es para subir a la carpeta padre (rutas relativas)
//dirname(__DIR__) Rutas absolutas
require_once dirname(__DIR__).'/BaseDatos/ConexionBD.php';
require_once dirname(__DIR__).'/LogicaNegocio/Libro.php';

class LibroServicios {

    private $db;
    
    public function __construct() {
        $this->db = new ConexionBD();
    }
    
    public function listasLibros(){        
        $this->db->getConeccion();
        $sql = "SELECT * FROM LIBROS ORDER BY CODIGO ASC";
        $registros = $this->db->executeQueryReturnData($sql);          
        $libros = array();
        
        foreach ($registros as $posicion => $fila) {
           $libro = new Libro($fila['codigo'],$fila['nombre'],$fila['autor'],$fila['fecha']); 
           array_push($libros, $libro);
        }
        $this->db->cerrarConeccion();
        
        return $libros;
    }
    
    public function registrarLibro($libro){
        $this->db->getConeccion();
        $sql= "INSERT INTO LIBROS(NOMBRE,AUTOR,FECHA) VALUES (?,?,?)";
        $tipos = 'sss';
        $listaValores = array($libro->getNombre(),$libro->getAutor(),$libro->getFecha());
        
        $this->db->executeQuery($sql, $tipos, $listaValores);
        $this->db->cerrarConeccion();
    }
    
    public function eliminarLibro($codigo){
        $this->db->getConeccion();
        $sql = "DELETE FROM LIBROS WHERE CODIGO = ?";
        $tipos = 'i';
        $listaValores = array($codigo);
        
        $this->db->executeQuery($sql, $tipos, $listaValores);
        $this->db->cerrarConeccion();
    }
    
    public function buscarLibroByCodigo($codigo){
        $this->db->getConeccion();
        $sql="SELECT * FROM LIBROS WHERE CODIGO=$codigo";
        $fila = $this->db->executeQueryReturnData($sql); 
        
        $libro = new Libro($fila[0]['codigo'],$fila[0]['nombre'],$fila[0]['autor'],$fila[0]['fecha']);
        /*foreach ($registros as $posicion => $fila) {
           $libro = new Libro($fila['codigo'],$fila['nombre'],$fila['autor'],$fila['fecha']); 
        }*/        
        $this->db->cerrarConeccion();      
        
        return $libro;
    }
    
    function modificarLibro($libro) {
        $this->db->getConeccion();
        $sql = "UPDATE LIBROS SET NOMBRE= ?,AUTOR= ?,FECHA= ? WHERE CODIGO= ?";
        $tipos = "sssi";
        $listaValores = array($libro->getNombre(),$libro->getAutor(),$libro->getFecha(),$libro->getCodigo());
        $this->db->executeQuery($sql, $tipos, $listaValores);
        $this->db->cerrarConeccion();
    }
}

?>













