<?php
   require_once __DIR__.'/LogicaNegocio/LibroServicios.php';        

   //Aquí entra la acción registrar
   if(isset($_POST['accion'])){
       switch($_POST['accion'])
       {
           case 'registrar':
               guardarLibro();
               header('location:index.php');
               break; 
        case 'modificar':
            modificarLibro();
            header('location:index.php');
            break;                
       }
   }
   
   //Aquí entra la acción eliminar
   if(isset($_GET['accion'])){
       switch($_GET['accion'])
       {
           case 'eliminar':
               eliminarLibro();
               header('location:index.php');
       }
   }   

   function guardarLibro(){
       
       $nombre = $_POST['nombre'];
       $autor  = $_POST['autor'];
       $fecha  = $_POST['fecha'];
       $libro = new Libro(0,$nombre,$autor,$fecha);   
       
       $servicios = new LibroServicios();       
       $servicios->registrarLibro($libro);
   }
   
   function eliminarLibro(){
       $codigo = $_GET['codigo'];
       
       $servicios = new LibroServicios();
       $servicios->eliminarLibro($codigo);
   }
   
  function modificarLibro(){
      $id = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $autor = $_POST['autor'];
      $fecha = $_POST['fecha']; 
      $servicios = new LibroServicios();
      
      $libro = new Libro($id,$nombre,$autor,$fecha); 
      $servicios->modificarLibro($libro);
  }     
?>