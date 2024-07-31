<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Model_Main;

class Controller_Main extends Controller
{
    public function __construct()
    {
        $this->model = new Model_Main();
    }
    public function action_index()
    {
        \App\Core\View::Generate('main', 'crud');
    }

    public function action_read()
    {
        $this->model->Read();
    }
}