<?php
//    Load Config
    require_once "config/config.php";

    // Load Libraries
//    require_once "libraries/Core.php";
//    require_once "libraries/Controller.php";
//    require_once "libraries/Database.php";

    // AutoLoad Core Libraries
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($className){
        $path = "libraries/";
        $ext = ".php";
        $fullPath = $path . $className . $ext;
        try {
            require_once $fullPath;
        }catch(TypeError $e){
            echo "Error: $e";
        }
    }
