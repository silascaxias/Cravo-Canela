<div class="col-md-9">
    <div class="profile-content">
        <a href="<?=HOME_URI?>/cliente/create?>" class="button back new float-right" style="margin-bottom: 10px;">
            Novo
        </a>
        <h1>Usuarios</h1><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome dos Noivos</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Data do Casamento</th>
                </tr>
            </thead>
            <?php foreach($this->model->cliente as $clientes){ ?>
            <tr>
                <td><?=$clientes['couple_id']?></td>
                <td><?=$clientes['couple_nome']?></td>
                <td><?=$clientes['couple_email']?></td>
                <td><?=$clientes['couple_tell']?></td>
                <td><?=$clientes['couple_date'] = date("d/m/Y")?></td>
                <td>
                    <a href="<?=HOME_URI?>/cliente/edit/<?=$clientes['couple_id']?>" class="icon-edit"></a>
                     <a href="<?=HOME_URI?>/cliente/delete/<?=$clientes['couple_id']?>" class="icon-excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')"></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>