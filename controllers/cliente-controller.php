<?php 

class ClienteController extends MainController {
    public function __construct() {
        parent::__construct();
        //$this->ensure_is_logged();
        $this->load_model('ClienteModel');
        $this->load_model('ProfileModel');
        $this->load_model('ClienteFileModel');
        $this->load_model('UserModel');
        $this->load_model('UserFileModel');
    }
    public function index() {
        $this->title = "Usuários";
        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures_user($id);
        $this->model->cliente = ClienteModel::All();
        $this->load_page('cliente/index.php');
    }
    
    public function select(){
        $data = $_POST;
        $nome = $data['nome_noivos'];
        $cliente = ClienteModel::where("couple_nome ='".$nome."'");
        $this->model->cliente = $cliente;
        $this->model->idCliente = $cliente[0]['couple_id'];
        $this->model->imagem = $this->fill_pictures($this->model->idCliente);
        $this->load_page('listas/listCasal.php');
    }
    
    public function edit() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        $cliente = ClienteModel::find($id);
        if (!$cliente) {
            $this->throw_404();
        }
        $id_user = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures_user($id_user);
        $this->model->imagem = $this->fill_pictures($id);
        $couple_id = $cliente['couple_id'];
        $this->model->cliente = $cliente;
        $this->load_page('cliente/edit.php');
    }

    public function create() {
        $this->title = "Novo Responsável";
        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures_user($id);
        $this->load_page('cliente/create.php');
    }

    public function delete() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];

        $result = ClienteFileModel::where('Couple_Id = ' . $id);

        foreach ($result as $product_File_Id) {
            $id_File .= $product_File_Id['couple_File_Id'] . ',';
        }
        ClienteFileModel::delete($id_File);
        ClienteModel::delete($id);
        $this->set_message('Usuário deletado', 'warning');
        $this->goto_page(HOME_URI . '/cliente/index');
    }


    public function save() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $data = $_POST;
        $id = $parameters[0];
        if ($id) {
            $data['couple_id'] = $id;
        }
        $cliente = new ClienteModel($data);
        $results = $cliente->save();

        $dirToSavePics = UP_ABSPATH . '/' . $results->id;
        $this->create_dir_if_no_exists($dirToSavePics);
        for ($i = 0; $i < count($_FILES['Image']['name']); $i++) {
            $this->save_file($results->id, $_FILES['Image']['name'][$i], $_FILES['Image']['tmp_name'][$i], $dirToSavePics);
        }
        $this->set_message('Salvo com sucesso', 'success');
        $this->goto_page(HOME_URI . '/cliente/index');
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
            'File_Nome' => $uploadFileName,
            'Couple_Id' => $User_Id
        );
        $file = new ClienteFileModel($fileData);
        $file->save();
    }

    private function fill_pictures($id) {
        $updates = ClienteModel::where('couple_id = ' . $id);

        if (!$updates) {
            return array();
        }
        $updateIds = "";

        foreach ($updates as $update) {
            $updateIds .= $update['couple_id'] . ',';
        }

        $updateIds = substr($updateIds, 0, strlen($updateIds) -1);
        if (!$updateIds) {
            return array();
        }
        $files = ClienteFileModel::where('Couple_Id IN ('. $updateIds .')');
        $pictures = array();
        foreach($files as $file) {
            $pictures[] = array(
                'src' => HOME_URI . '/views/_uploads/' . $id . '/' . $file['File_nome'],
                'Titulo' => $file['Titulo']
            );
        }

        return $pictures;
    }

    private function fill_pictures_user($id) {
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