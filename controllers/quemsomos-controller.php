<?php

class QuemSomosController extends MainController
{
    public $use_permission_system = false;
    public function index() {        
        $this->title = 'Quem Somos';
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $this->load_page('QuemSomos/index.php');
    }
}