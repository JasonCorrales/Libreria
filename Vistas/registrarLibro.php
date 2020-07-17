<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>        
        <section>
            <H1>Registrar Libro</H1>
            <form method="post" action="../libroController.php">
                <input type="text" placeholder="Nombre" name="nombre" required><br>
                <input type="text" placeholder="Autor" name="autor" required><br>
                <input type="date" placeholder="Fecha" name="fecha" required><br>
                <input type="submit" name="accion" value="registrar">
            </form>
        </section>         
    </body>
</html>
