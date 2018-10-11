<?php

class AdminController extends MainController
{

    public function __construct() {
        parent::__construct();
        $this->ensure_is_logged();
        $this->load_model('UserModel');
        $this->load_model('ProfileModel');
        $this->load_model('UserFileModel');

    }

    public function index() {
       // $this->ensure_is_logged();
        $this->title = 'Admin Panel';
        $this->model->users = UserModel::all();
        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures($id);
        $this->model->users = count($this->model->users);
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();  
        $this->load_page('admin/index.php');
    }

    private function fill_pictures($id) {
        $updates = UserModel::where('User_Id = ' . $id);

        if (!$updates) {
            return array();
        }
        $updateIds = "";

        foreach ($updates as $update) {
            $updateIds .= $update['User_Id'] . ',';
        }

        $updateIds = substr($updateIds, 0, strlen($updateIds) -1);
        if (!$updateIds) {
            return array();
        }
        $files = UserFileModel::where('User_Id IN ('. $updateIds .')');
        $pictures = array();
        foreach($files as $file) {
            $pictures[] = array(
                'src' => HOME_URI . '/views/_uploads/' . $id . '/' . $file['File_nome'],
                'Titulo' => $file['Titulo']
            );
        }

        return $pictures;
    }
}