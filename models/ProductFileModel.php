<?php
    class ProductFileModel extends BaseModel {
        protected static $table = "tb_product_files";
        protected static $primaryKey = "product_File_Id";
        protected $fields = array(
            'product_File_Id',
            'Titulo',
            'File_nome',
            'product_Id'
        );
    }
?>