<!DOCTYPE html>
<html>
    <head>
        <title>consultar</title>
    </head>
    <body>
        <?php
            session_start();
            if ($_SESSION['login']!=true && !isset($_SESSION['login'])){
                header('Location: login.php');
                exit;
            }
            else{
                echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION['nombre']) . "</h1>";
                require_once 'includes/database.php';
                $propietario=$_SESSION['id'];
                $consulta="SELECT id, nombre FROM contactos WHERE usuario_id = '$propietario'";
                $tabla=$base->prepare($consulta);
                $tabla->execute();
                while ($persona=$tabla->fetch(PDO::FETCH_ASSOC)){
                    echo "<h3>".$persona['id']." | ".$persona['nombre']." |</h3>";
                }
            }
        ?>
        <form action="includes/funciones.php" method="POST">
            <input type="number" name="id" placeholder="id" required>
            <input type="text" name="nombre" placeholder="nombre" required>
            <input type="number" name="telefono" placeholder="telefono" required>
            <input type="email" name="email" placeholder="email" required>
            <select name="crud">
                <option value="agregar">agregar</option>
                <option value="eliminar">eliminar</option>
                <option value="actualizar">actualizar</option>
                <option value="consultar">buscar</option>
            </select>
            <input type="submit" value="procesar">
        </form>
        <hr>
        <h3><a href="logout.php">logout</a></h3>
    </body>
</html>