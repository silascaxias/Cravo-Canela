<?php

class HomeController extends MainController
{

    public function index() {        
        $this->title = 'Home';
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $this->load_page('home/index.php');
    }
}