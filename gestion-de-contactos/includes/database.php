<?php
define('DB_SERVIDOR', 'localhost');
define('DB_USUARIO', 'root');
define('DB_PASS', '');
define('DBNOMBRE', 'contactos-app');
try{
    $base=new PDO("mysql:host=".DB_SERVIDOR."; dbname=".DBNOMBRE."", DB_USUARIO, DB_PASS);
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch (PDOException $e){
    die("Error: ".$e->getMessage());
}