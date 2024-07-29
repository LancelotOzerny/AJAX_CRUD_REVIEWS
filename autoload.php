<?php
function Autoload($namespace)
{
    $path = mb_strtolower($namespace) . '.php';

    if (file_exists($path))
    {
        include_once $path;
    }
    else
    {
        throw new ErrorException("Class $namespace is not founded!");
    }
}

spl_autoload_register('Autoload');