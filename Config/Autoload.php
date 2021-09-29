<?php
    namespace Config;

    class Autoload{
        public static function Start(){
            spl_autoload_register(function($class_name){
                $class_path = ucwords(str_replace("\\","/",ROOT.$class_name).".php");
                include_once($class_path);
            });
        }
    }

?>