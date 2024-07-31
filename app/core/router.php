<?php
namespace App\Core;

class Router
{
    public static function Start()
    {
        $controller = 'main';


        $controllerPath = "/controllers/$controller.php";

        if (file_exists($controllerPath))
        {

        }
    }
}