<?php 

class ListController extends MainController {
    public function __construct() {
        parent::__construct();
        $this->load_model('ClienteModel');
        $this->load_model('ProductModel');
        $this->load_model('ListaModel');
        $this->load_model('ListaProdutoModel');
        $this->load_model('UserModel');
        $this->load_model('UserFileModel');
        $this->load_model('ListProduto');
        $this->load_model('ProductFileModel');
    }
    public function index() {
        if($this->logged_in){
            $this->title = 'Registro de Vendas';
            $this->model->visualize_url = HOME_URI . '/list/create/';

            $id = $_SESSION['userdata']['User_Id'];
            $this->model->userImg = $this->fill_pictures_user($id);
            $this->model->list = ListaModel::all();

            $this->model->ver_url = HOME_URI . '/list/ver/';

            $this->load_page('list/index.php');
        }else{
            $this->title = 'Login';
            $parameters = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
            $this->load_page('login/index.php');
        }
    }
    /*public function listProduct(){
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        $produtos = ListaModel::where("couple_id ='".$id."'");
        $idLista = $produtos[0]['id_tb_lista'];

        $lista = ListaProdutoModel:: where("id_lista ='".$idLista."'");
        
        foreach ($lista as $litVar){
            $this->model->produto = ProductModel:: where("id_product ='".$litVar['id_produto']."'");
            c
        }
            $this->goto_page('listas/listProduto.php');
    }*/
    public function listProduct(){
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        
        $lista = ListaModel::where("couple_id ='".$id."'");
        $this->model->lista = ListaModel::where("id_tb_lista='".$lista[0]['id_tb_lista']."'");
        $produtos = ListaProdutoModel::where("id_lista ='".$lista[0]['id_tb_lista']."'");
        $produtos2 = array();
        $produtos2['imagem'] = array();
        $idImagem = array();
        foreach ($produtos as $idProduto){
            array_push($produtos2, ProductModel::where("id_product ='".$idProduto['id_produto']."'"));
            array_push($produtos2['imagem'], $this->fill_pictures($idProduto['id_produto']));
        }
        $this->model->produto = $produtos2;
        $this->model->imagemProduto = $idImagem;
        echo '<pre>';
        print_r($this->model->produto);
        echo '</pre>';
        $this->load_page('listas/listProduto.php');
    }

    public function ver() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $this->model->id = $parameters[0];

        $this->model->total = null;

        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures_user($id);
        $this->model->ver = ListaProdutoModel::where("id_lista =".$this->model->id);
        
        $this->title = 'Detalhes da Venda';
        $this->load_page('list/ver.php');
    }

    public function create() {
        $this->title = "Nova Venda";
        $id = $_SESSION['userdata']['User_Id'];
        $this->model->userImg = $this->fill_pictures_user($id);
        $this->model->clientes = ClienteModel::all();
        $this->model->produtos = ProductModel::all();
        
        if(isset($_POST['removeCli'])){
            $_SESSION['couple_nome'] = NULL;  
        }
        if(isset($_POST['couple_id'])){            
            $idCli = $_POST['couple_id'];

            if($idCli == -1){
                $this->set_message('Informe um cliente!', 'error');
                $this->goto_page(HOME_URI . '/list/create');
                exit;
            }
            if($_SESSION['couple_nome'] == null){
                $_SESSION['couple_nome'] = $this->retornaCliente($idCli);  
            }
        }                

        $this->load_page('list/create.php');
    }

    public function retornaProduto($id){
        $this->model->produtos = ProductModel::all();
        foreach ($this->model->produtos as $prod) {
            if($prod['id_product'] == $id){
                $produtos = ProductModel::find($id);
                return $produtos;
            }
        }
    }
    public function descProd($id){
        $this->model->produtos = ProductModel::all();

        foreach ($this->model->produtos as $prod) {
            if($prod['id_product'] == $id){

                return $prod['descript_product'];

            }
        }
    }

    public function preProd($id){
        $this->model->produtos = ProductModel::all();

        foreach ($this->model->produtos as $prod) {
    
            if($prod['id_product'] == $id){

                return $prod['price_product'];
            }
        }
    }
    public function retornaCliente($id){
       $cliente = $this->model->cliente = ClienteModel::all();
        foreach ($cliente as $cli) {
            if($cli['couple_id'] == $id){
                return $cli['couple_nome'];
            }
        }
    }
    public function addproduct(){
            $idProd = $_POST['id_product'];
            if($idProd == -1){
                $this->set_message('Informe um produto!', 'warning');
                $this->goto_page(HOME_URI . '/list/create'); 
                exit();  
            }
            
            $produtos = $this->retornaProduto($idProd);

            foreach ($_SESSION['produtos'] as $prod){           
                if($prod['id_product'] == $idProd){
                    $_SESSION['produtos'][$prod]['id_product'];
                    $_SESSION['produtos'][$prod]['descript_product'];
                    $_SESSION['produtos'][$prod]['price_product'];
                    $this->goto_page(HOME_URI . '/list/create');    
                                  
                }
            }
            array_push($_SESSION['produtos'], $produtos);
            $this->goto_page(HOME_URI . '/list/create');  
    }

    public function deletarLista(){
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $id = $parameters[0];
        
        $results = ListaModel::delete($id);
        $results2 = ListaProdutoModel::deleteItens('id_lista',$id);

        if($results && $results2){
            $this->set_message('Erro ao deletar a venda!', 'error');
            $this->goto_page(HOME_URI . '/list');
            
        }
        $this->goto_page(HOME_URI . '/list');
    }

    public function deletar(){
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $id = $parameters[0];
        foreach ($_SESSION['produtos'] as $key => $prod) {
            if($prod['id_product'] == $id){
                    $_SESSION['produtos'][$key]['id_product'];
                    $_SESSION['produtos'][$key]['id_product'];
                    $this->goto_page(HOME_URI . '/list/create');    
                    exit();              
                }
        }
    }

    public function limpar(){

        $_SESSION['couple_nome'] = NULL;
        foreach ($_SESSION['produtos'] as $key => $prod) {
            unset($_SESSION['produtos'][$key]);
        }

        $this->set_message('Sucesso ao limpar a venda!', 'success');
        $this->goto_page(HOME_URI . '/list/create'); 
    }


    public function salvarLista() {

        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $data = $_POST;
        $id = $parameters[0];
        $_SESSION['couple_nome'] = NULL;

        if($_POST['couple_nome'] == null){
            $this->set_message('Informe um cliente antes de salvar!', 'warning');
            $this->goto_page(HOME_URI . '/list/create'); 
            exit();
        }

        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');

        $data['data_venda'] = $date;
        $cli = ClienteModel::Where("couple_nome = '".$_POST['couple_nome']."'");
        $data['couple_id'] = $cli[0]['couple_id'];

        $list = new ListaModel($data);
        $results = $list->save();

        if (!$results->id) {
            $this->set_message('Houve um problema ao salvar a venda!', 'error');
            $this->goto_page(HOME_URI . '/list/create');
            exit;
        }
        
        $idLista = $results->id;
        
        foreach ($_SESSION['produtos'] as $key => $prod) {
                $data = array(
                    "id_lista" => $idLista,
                    "id_produto"  => $prod['id_product']
                );
                
                $itemVenda = new ListaProdutoModel($data);
                $results = $itemVenda->save();
                unset($_SESSION['produtos'][$key]);
        }
        $this->set_message('Venda registrada com sucesso', 'success');
        $this->goto_page(HOME_URI . '/list');
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