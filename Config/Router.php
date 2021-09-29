<?php
    namespace Config;

    use Config\Request as Request;

    class Router{
        public static function Route(Request $request){
            $controller_name = $request->getController().'Controller';
            $method_name = $request->getMethod();
            $method_parameters = $request->getParameters();
            $controller_class_name = "Controller\\".$controller_name;

            $controller = new $controller_class_name;
        
            if(!isset($method_parameters))
                call_user_func(array($controller,$method_name));
            else
                call_user_func_array(array($controller,$method_name),$method_parameters);

        }



    }
?>