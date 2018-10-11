<?php 

class UsersController extends MainController {
    public function __construct() {
        parent::__construct();
        $this->ensure_is_logged();
        $this->load_model('UserModel');
        $this->load_model('ProfileModel');
        $this->load_model('UserFileModel');
    }
    public function index() {
        $this->title = "Usuários";
        $this->model->users = UserModel::All();
        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures($id);
        $this->load_page('users/index.php');
    }
    public function edit() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        $user = UserModel::find($id);
        if (!$user) {
            $this->throw_404();
        }
        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures($id);
        $this->model->imagem = $this->fill_pictures($id);
        $profileId = $user['Profile_Id'];
        $this->model->user = $user;
        $this->model->profiles = ProfileModel::all();
        $this->load_page('users/edit.php');
    }

    public function create() {
        $this->title = "Novo Responsável";
        $this->model->users = UserModel::All();
        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures($id);
        $this->load_page('users/create.php');
    }

    public function delete() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $id = $parameters[0];
        if (!$parameters) {
            $this->throw_404();
        }
        $result = UserFileModel::where('User_Id = ' . $id);

        foreach ($result as $product_File_Id) {
            $id_File .= $product_File_Id['User_File_Id'] . ',';
        }
        UserFileModel::delete($id_File);
        UserModel::delete($id);
        $this->set_message('Usuário deletado', 'warning');
        $this->goto_page(HOME_URI . '/users/index');
    }
    
    public function save() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $data = $_POST;
        $id = $parameters[0];
        if ($id) {
            $data['User_Id'] = $id;
        }
        $data['user_senha'] = $this->phpass->HashPassword($data['user_senha']);
        $user = new UserModel($data);
        $results = $user->save();

        
        $dirToSavePics = UP_ABSPATH . '/' . $results->id;
        $this->create_dir_if_no_exists($dirToSavePics);
        for ($i = 0; $i < count($_FILES['Image']['name']); $i++) {
            $this->save_file($results->id, $_FILES['Image']['name'][$i], $_FILES['Image']['tmp_name'][$i], $dirToSavePics);
        }
        
        $this->set_message('Salvo com sucesso', 'success');
        $this->goto_page(HOME_URI . '/users/index');
    }
    private function save_file($User_Id, $fileName, $filePath, $dir, $text = "Imagem inserida pelo Relator") {
        $uniq = uniqid();
        $exploded = explode('.', $fileName);
        $extension = $exploded[count($exploded) - 1];
        $uploadFileName = $uniq . '.' . $extension;
        $upload_file = $dir . '/'. $uploadFileName;
        if (!move_uploaded_file($filePath, $upload_file)) return;
        $fileData = array(
            'Titulo' => $text,
            'File_nome' => $uploadFileName,
            'User_Id' => $User_Id
        );
        $file = new UserFileModel($fileData);
        $file->save();
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

?>