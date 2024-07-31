<?php
namespace App\Core;

abstract class Controller
{
    protected $model;
    public abstract function action_index();
}