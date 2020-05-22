<?php
    
    try{
        $conn = mysqli_connect(
            'localhost', # el servidor
            'root', # usuario
            '', # contrasenia
            'php_login_database' # nombre de la bd   
        );

    }
    catch(Exception $e){
        die('Connected failed: '.$e->getMessage());
    }

?>