<?php

namespace Lib;


class Route 
{
    private static $routes=[];

    public static function get($uri,$callback)
    {
        $uri=trim($uri,'/');
        self::$routes['GET'][$uri]=$callback;

    }

    public static function post($uri,$callback)
    {
        $uri=trim($uri,'/');
        self::$routes['POST'][$uri]=$callback;
    }

    public static function dispatch (){

        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

       foreach (self::$routes[$method] as $route =>$callback){

        if (strpos($route,':') !==false ) {
            $route=preg_replace('#:[a-zA-Z]+#','([a-zA-Z0-9]+)',$route, );
        }

        if (preg_match("#^$route$#",$uri, $matches )) {
            
            $params=array_slice($matches, 1);
            
               

               if (is_callable($callback)) {
                $respuesta= $callback(...$params);
               }

               if (is_array($callback)) {
                $controller = new $callback[0];
                $respuesta = $controller->{$callback[1]}(...$params);
                }

               if(is_array ($respuesta) || is_object($respuesta)) {

                header('content-type: applicaction/json');
                
                echo json_encode($respuesta);
               }else{
                echo $respuesta;
               }
           

            return;
        }

       }
       echo 'error 404 pagina no encontrada';
    }
     
}
?>