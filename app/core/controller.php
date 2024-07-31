<?php
namespace App\Core;

abstract class Controller
{
    private $model;

    public function __construct()
    {

    }

    public abstract function action_index();
}