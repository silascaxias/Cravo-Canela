<?php
    class ListaProdutoModel extends BaseModel {
        protected static $table = "tb_lista_produto";
        protected static $primaryKey = NULL;
        protected $fields = array(
            'id_lista',
            'id_produto'
        );
    }
?>