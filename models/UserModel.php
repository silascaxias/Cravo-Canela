<?php

class UserModel extends BaseModel {
    protected static $table = "tb_user";
    protected static $primaryKey = "User_Id";
    protected $fields = array(
        'user_nome',
        'User_Id',
        'user_email',
        'user_senha',
        'Profile_Id',
        'Last_Activity'
    );
}
?>