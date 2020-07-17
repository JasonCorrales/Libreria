<?php

class Libro {   
    private $codigo;
    private $autor;
    private $nombre;
    private $fecha;
    
    public function __construct($codigo,$nombre,$autor,$fecha){        
        $this->codigo = $codigo;
        $this->autor = $autor;
        $this->nombre = $nombre;
        $this->fecha = $fecha;        
    }    
    
    function getCodigo() {
        return $this->codigo;
    }

    function getAutor() {
        return $this->autor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
}

?>