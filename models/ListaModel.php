<?php
    class ListaModel extends BaseModel {
        protected static $table = "tb_lista";
        protected static $primaryKey = "id_tb_lista";
        protected $fields = array(
            'id_tb_lista',
            'couple_id'
        );
    }
?>