<?php
namespace App\Core;

class Router
{
    public static function Start()
    {
        global $HOME;
        $controllerName = 'main';
        $action = 'index';

        $arr = explode('/', $_SERVER['REQUEST_URI']);
        if (count($arr) === 3)
        {
            $action = $arr[1];
        }
        else if (count($arr) > 3)
        {
            $controllerName = $arr[1];
            $action = $arr[2];
        }

        $controllerName = "app\controllers\controller_$controllerName";
        $controllerPath = $HOME . "/$controllerName.php";
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