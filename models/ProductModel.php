<?php

class ProductModel extends BaseModel {
    protected static $table = "tb_product";
    protected static $primaryKey = "id_product";
    protected $fields = array(
        'id_product',
        'descript_product',
        'price_product'
    );
}
?>