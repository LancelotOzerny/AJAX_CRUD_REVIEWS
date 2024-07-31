<?php
namespace App\Core;

class View
{
    public static function Generate(string $view, string $template, array $data = [])
    {
        global $HOME;

        $templatePath = "$HOME/app/templates/$template";
        $viewPath = "$HOME/app/views/view_$view.php";
        $headerPath = "$templatePath/header.php";
        $footerPath = "$templatePath/footer.php";

        self::RequireFile($headerPath, "Header шаблона $template не найден!");
        self::RequireFile($viewPath, "Представление $view не существует!");
        self::RequireFile($footerPath, "Footer шаблона $template не найден!");
    }

    private static function RequireFile($path, $errorMessage)
    {
        if (file_exists($path))
        {
            include $path;
        }
        else
        {
            echo $errorMessage;
        }
    }
}