<?php
            if ($_SERVER['REQUEST_METHOD']=="POST"){
                require_once 'includes/database.php';
                $usuario=htmlspecialchars($_POST['usuario']);
                $email=htmlspecialchars($_POST['email']);
                $clave=htmlspecialchars($_POST['clave']);
                $fecha=date("Y-m-d");
                $hash=password_hash($clave, PASSWORD_DEFAULT);
                $query2="SELECT * FROM usuarios";
                $no_copia=$base->prepare($query2);
                $no_copia->execute();
                while ($eldoble=$no_copia->fetch(PDO::FETCH_ASSOC)){
                    if ($email==$eldoble['email'] && password_verify($clave, $eldoble['clave'])){
                        $existe=true;
                        break;
                    }
                }
                if (isset($existe)){
                    if ($existe==true){
                        header('Location: agregar.php');
                        exit;
                    }
                }
                else{
                    $query="INSERT INTO usuarios (id, nombre, email, clave, fecha_creacion) VALUES (?, ?, ?, ?, ?)";
                    $resultado=$base->prepare($query);
                    $resultado->execute([rand(1, 100), $usuario, $email, $hash, $fecha]);
                    header('Location: agregar.php');
                    exit;
                }
            }
        ?>