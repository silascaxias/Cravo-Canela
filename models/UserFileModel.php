<?php
    class UserFileModel extends BaseModel {
        protected static $table = "tb_user_files";
        protected static $primaryKey = "User_File_Id";
        protected $fields = array(
            'User_File_Id',
            'Titulo',
            'File_nome',
            'User_Id'
        );
    }
?>