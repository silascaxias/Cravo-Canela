<?php
    class ClienteFileModel extends BaseModel {
        protected static $table = "tb_couple_files";
        protected static $primaryKey = "couple_File_Id";
        protected $fields = array(
            'couple_File_Id',
            'Titulo',
            'File_Nome',
            'Couple_Id'
        );
    }
?>