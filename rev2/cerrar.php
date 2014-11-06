<?php 
    session_start(); 
    
    // para que carajo incluyen estos datos
    // si no van a hacer nada en la base de datos
    // desde aqui?
    // lol.
    // include("../conexion/conex.php"); // incluímos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesión 
    
    
    //para que hacen una comprobacion
    // cuando se intenta resetear la sesion?
    //esto es inutil:
    //     if(isset($_SESSION['des_pa'])) { 
    //         session_destroy(); 
    //         header("Location: index.php"); 
    //     }else { 
    //         echo "Operación incorrecta."; 
    //     } 

    session_start(); 
    include("conexion/conex.php"); // incluímos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesión 
    if(isset($_SESSION['des_pa'])) { 
        session_destroy(); 
        header("Location: index.php"); 
    }else { 
        echo "Operación incorrecta."; 
    }
    session_destroy();
    session_unset();
    header('Location: index.php');

?>