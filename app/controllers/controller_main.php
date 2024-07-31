<?php

use App\Core\Controller;

class Controller_Main extends Controller
{
    public function action_index()
    {
        \App\Core\View::Generate('main', 'crud');
    }
}