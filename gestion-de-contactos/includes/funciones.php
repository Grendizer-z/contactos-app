<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST"){
        require_once 'database.php';
        if ($_POST['crud']=="agregar"){
            $contacto_nombre=trim(htmlspecialchars($_POST['nombre']));
            $contacto_id=rand(1, 1000);
            $mi_id=$_SESSION['id'];
            $telefono=trim(htmlspecialchars($_POST['telefono']));
            $contacto_email=trim($_POST['email']);
            $fecha_c=date("Y-m-d");
            $consulta="INSERT INTO contactos (id, usuario_id, nombre, telefono, email, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?)";
            $nuevo_contacto=$base->prepare($consulta);
            $nuevo_contacto->execute([$contacto_id, $mi_id, $contacto_nombre, $telefono, $contacto_email, $fecha_c]);
            header('Location: ../index.php');
            exit;
        }
        else if ($_POST['crud']=="eliminar"){
            $contacto_id=trim(htmlspecialchars($_POST['id']));
            $consulta="DELETE FROM contactos WHERE id = ?";
            $nuevo_contacto=$base->prepare($consulta);
            $nuevo_contacto->execute([$contacto_id]);
            header('Location: ../index.php');
            exit;
        }
        else if ($_POST['crud']=="actualizar"){
            $contacto_nombre=trim(htmlspecialchars($_POST['nombre']));
            $contacto_id=trim(htmlspecialchars($_POST['id']));
            $mi_id=$_SESSION['id'];
            $telefono=trim(htmlspecialchars($_POST['telefono']));
            $contacto_email=trim($_POST['email']);
            $fecha_c=date("Y-m-d");
            $consulta2="SELECT * FROM contactos WHERE id = ?";
            $mitabla=$base->prepare($consulta2);
            $mitabla->execute([$contacto_id]);
            while ($modificado=$mitabla->fetch(PDO::FETCH_ASSOC)){
                $datos=$modificado;
            }
            $consulta="UPDATE contactos SET nombre = ?, telefono = ?, email = ? WHERE id = ? AND nombre = ? AND telefono = ? AND email = ?";
            $nuevo_contacto=$base->prepare($consulta);
            $nuevo_contacto->execute([$contacto_nombre, $telefono, $contacto_email, $datos['id'], $datos['nombre'], $datos['telefono'], $datos['email']]);
            header('Location: ../index.php');
            exit;
        }
        else if ($_POST['crud']=="consultar"){
            $contacto_nombre=trim(htmlspecialchars($_POST['nombre']));
            $contacto_id=trim(htmlspecialchars($_POST['id']));
            $mi_id=$_SESSION['id'];
            $telefono=trim(htmlspecialchars($_POST['telefono']));
            $contacto_email=trim($_POST['email']);
            $fecha_c=date("Y-m-d");
            $consulta2="SELECT * FROM contactos WHERE id = ? AND usuario_id = ?";
            $mitabla=$base->prepare($consulta2);
            $mitabla->execute([$contacto_id, $mi_id]);
            while ($modificado=$mitabla->fetch(PDO::FETCH_ASSOC)){
                echo "<h2>" . htmlspecialchars($modificado['id']) . " | " . htmlspecialchars($modificado['nombre']) . " | " . htmlspecialchars($modificado['email']) . " | " . htmlspecialchars($modificado['telefono']) . " | ";
            }
        }
}
?>

<body>
    <h2><a href="../">home</a></h2>
</body>