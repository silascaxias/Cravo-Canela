
<div class="col-md-9">
    <div class="profile-content">
        <a href="<?=HOME_URI?>/list/create" class="button back new float-right" style="margin-bottom: 10px;">
            Novo
        </a>
        <h1>Listas</h1><br>
        <table class="table">
            <thead>
                <tr>
                    <th>N. Lista</th>
                    <th>Casal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php foreach($this->model->list as $lista){ ?>
            <tr>
                <td><?=$lista['id_tb_lista']?></td>
                <td><?=$this->retornaCliente($lista['couple_id'])?></td>
                
                <td>
                    <a href="<?=HOME_URI?>/list/ver/<?=$lista['id_tb_lista']?>" class="icon-edit"></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
