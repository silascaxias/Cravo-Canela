<?php

class ClienteModel extends BaseModel {
    protected static $table = "tb_couple";
    protected static $primaryKey = "couple_id";
    protected $fields = array(
        'couple_id',
        'couple_nome',
        'couple_tell',
        'couple_email',
        'couple_date'
    );
}
?>