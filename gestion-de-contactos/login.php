<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'){
    require_once 'includes/database.php';
    $email=trim($_POST['email']);
    $clave=trim($_POST['clave']);
    $errores=[];
    if (empty($email) || empty($clave)){
        $errores[]="<h2>Los campos son requeridos</h2>";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errores[]="<h2>Debe ingresar un email valido</h2>";
    else{
        $consulta="SELECT * FROM usuarios WHERE email = ?";
        $resultado=$base->prepare($consulta);
        $resultado->execute([$email]);
        while ($cuenta=$resultado->fetch(PDO::FETCH_ASSOC)){
            $hash=$cuenta['clave'];
            $registro=$cuenta;
            if (!password_verify($clave, $hash)){
                $errores[]="<h2>Contraseña incorrecta</h2>";
            }

        }
        if (empty($registro)){
            $errores[]="<h2>El usuario no existe</h2>";
        }
        if (!empty($errores)){
            foreach($errores as $fallo){
                echo $fallo;
            }
        }
        else{
            $_SESSION['id']=$registro['id'];
            $_SESSION['nombre']=$registro['nombre'];
            $_SESSION['email']=$registro['email'];
            $_SESSION['fecha']=$registro['fecha_creacion'];
            $_SESSION['login']=true;
            header('Location: index.php');
            exit;
        }
    }
}
else if (isset($_SESSION['login'])){
    if ($_SESSION['login']==true){
        header('Location: index.php');
        exit;
    }
}
?>

<body>
    <form action="" method="POST">
            <input type="text" name="email" placeholder="email" required>
            <input type="password" name="clave" placeholder="clave" required>
            <input type="submit" value="login">
    </form>
    <hr>
    <h2><a href="agregar.php">registrarse</a></h2>
</body>