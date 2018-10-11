<?php 

class ProductController extends MainController {
    public function __construct() {
        parent::__construct();
        //$this->ensure_is_logged();
        $this->load_model('ProductModel');
        $this->load_model('ProfileModel');
        $this->load_model('ProductFileModel');
        $this->load_model('UserModel');
        $this->load_model('UserFileModel');

    }
    public function index() {
        $this->title = "Usuários";
        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures_user($id);
        $this->model->products = ProductModel::All();
        $this->load_page('product/index.php');
    }
    public function edit() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        $id_user = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures_user($id_user);
        $this->model->imagem = $this->fill_pictures($id);
        $this->model->product = ProductModel::find($id);
        if (!$this->model->product ) {
            $this->throw_404();
        }
        

        $this->load_page('product/edit.php');
    }

    public function create() {
        $this->title = "Novo Responsável";
        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures_user($id);
        $this->load_page('product/create.php');
    }

    public function delete() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $id = $parameters[0];
        if (!$parameters) {
            $this->throw_404();
        }
        
        $result = ProductFileModel::where('product_Id = ' . $id);

        foreach ($result as $product_File_Id) {
            $id_File .= $product_File_Id['product_File_Id'] . ',';
        }
        ProductFileModel::delete($id_File);
        ProductModel::delete($id);

        $this->set_message('Usuário deletado', 'warning');
        $this->goto_page(HOME_URI . '/product/index');
    }

    public function save() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $data = $_POST;
        $id = $parameters[0];
        if ($id) {
            $data['id_product'] = $id;
        }
        $product = new ProductModel($data);
        $results = $product->save();

        
        $dirToSavePics = UP_ABSPATH . '/' . $results->id;
        $this->create_dir_if_no_exists($dirToSavePics);
        for ($i = 0; $i < count($_FILES['Image']['name']); $i++) {
            $this->save_file($results->id, $_FILES['Image']['name'][$i], $_FILES['Image']['tmp_name'][$i], $dirToSavePics);
        }
        
        $this->set_message('Salvo com sucesso', 'success');
        $this->goto_page(HOME_URI . '/product/index');
    }
    private function save_file($product_id, $fileNome, $filePath, $dir, $text = "Imagem inserida pelo Relator") {
        $uniq = uniqid();
        $exploded = explode('.', $fileNome);
        $extension = $exploded[count($exploded) - 1];
        $uploadFileName = $uniq . '.' . $extension;
        $upload_file = $dir . '/' . $uploadFileName;
        if (!move_uploaded_file($filePath, $upload_file)) return;
        $fileData = array(
            'Titulo' => $text,
            'File_nome' => $uploadFileName,
            'product_Id' => $product_id
        );
        $file = new ProductFileModel($fileData);
        $file->save();
    }
    private function fill_pictures($id) {
        $updates = ProductModel::where('id_product = ' . $id);

        if (!$updates) {
            return array();
        }
        $updateIds = "";

        foreach ($updates as $update) {
            $updateIds .= $update['id_product'] . ',';
        }

        $updateIds = substr($updateIds, 0, strlen($updateIds) -1);
        if (!$updateIds) {
            return array();
        }
        $files = ProductFileModel::where('product_id IN ('. $updateIds .')');
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