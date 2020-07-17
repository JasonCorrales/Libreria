<?php
  require_once dirname(__DIR__).'/LogicaNegocio/LibroServicios.php'; 

  if(isset($_GET['codigo'])){
      $codigo = $_GET['codigo'];
      $servicios = new LibroServicios();
      $libro = $servicios->buscarLibroByCodigo($codigo);
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>        
        <section>
            <H1>Modificar Libro</H1>
            <form method="post" action="../libroController.php">
                <input type="text" placeholder="Codigo" name="codigo" value="<?=$libro->getCodigo();?>" readonly><br>
                <input type="text" placeholder="Nombre" name="nombre" value="<?=$libro->getNombre();?>"><br>
                <input type="text" placeholder="Autor" name="autor" value="<?=$libro->getAutor();?>"><br>
                <input type="date" placeholder="Fecha" name="fecha" value="<?=$libro->getFecha();?>"><br>
                <input type="submit" name="accion" value="modificar">
            </form>
        </section>         
    </body>
</html>