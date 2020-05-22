<?php
    #paso1 necesariamente
    session_start();
    #paso2 quitar las sessiones
    session_unset();
    #paso3 
    session_destroy();
    #paso4
    header("Location: /php-login");

?>