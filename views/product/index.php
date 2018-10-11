
<div class="col-md-9">
    <div class="profile-content">
        <a href="<?=HOME_URI?>/product/create?>" class="button back new float-right" style="margin-bottom: 10px;">
            Novo
        </a>
        <h1>Lista de Produtos</h1><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição Produto</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <?php foreach($this->model->products as $product){ ?>
            <tr>
                <td><?=$product['id_product']?></td>
                <td><?=$product['descript_product']?></td>
                <td><?=$product['price_product']?></td>
                <td>
                    <a href="<?=HOME_URI?>/product/edit/<?=$product['id_product']?>" class="icon-edit"></a>
                     <a href="<?=HOME_URI?>/product/delete/<?=$product['id_product']?>" class="icon-excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')"></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
