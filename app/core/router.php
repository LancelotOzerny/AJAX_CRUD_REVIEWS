<?php
namespace App\Core;

class Router
{
    public static function Start()
    {
        global $HOME;
        $controllerName = 'main';
        $action = 'index';

        $controllerName = "controller_$controllerName";
        $controllerPath = $HOME . "/app/controllers/$controllerName.php";
        $controllerPath = str_replace('/', '\\', $controllerPath);

        $action = "action_$action";

        if (file_exists($controllerPath))
        {
            include $controllerPath;
            $controller = new $controllerName();

            if (method_exists($controller, $action))
            {
                $controller->$action();
            }
        }
        else
        {
            self::Page404();
        }
    }

    public static function Page404()
    {
        echo 'page 404';
    }
}