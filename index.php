<?php
       require_once __DIR__.'/LogicaNegocio/LibroServicios.php';
       $servicios = new LibroServicios();
       $listaLibros = $servicios->listasLibros();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <section>
            <br>
            <h1>Lista de Libros</h1>
            <br>
            <br>
            <ul>
                <li><a href="Vistas/registrarLibro.php">Registrar</a></li>
            </ul>

            <table id="t1" border="1">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if(count($listaLibros) >0):  
                        foreach($listaLibros as $posicion => $libro): ?>                         
                        <tr>
                            <td><?=$libro->getCodigo();?></td>
                            <td><?=$libro->getNombre();?></td>
                            <td><?=$libro->getAutor();?></td>
                            <td><?=$libro->getFecha();?></td>
                            <td><a href="Vistas/editarLibro.php?codigo=<?=$libro->getCodigo();?>">Editar</a></td>
                            <td><a href="libroController.php?accion=eliminar&codigo=<?=$libro->getCodigo();?>">Borrar</a></td>
                        </tr>
                <?php
                       endforeach;
                  endif;
                ?>
                </tbody>
            </table>
        </section>         
    </body>
</html>
