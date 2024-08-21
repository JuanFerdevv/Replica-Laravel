<?php

namespace App\Controller;

class Controller
{
    public function view($route, $datos=[])
    {
        extract($datos); 

       
        $route =str_replace('.','/',$route);

        if (file_exists("./Resourses/View/{$route}.php")) {

            ob_start();
            include "./Resourses/View/{$route}.php";
            $content= ob_get_clean();

            return $content;

        }else {
            return "no existe: {$route}";
        }
    }
    public function redirect($route){
        header("location:{$route}");
    }
}