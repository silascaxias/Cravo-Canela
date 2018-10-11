
<div class="col-md-9">
    <div class="profile-content">
        <a href="<?=HOME_URI?>/users/create>" class="button back new float-right" style="margin-bottom: 10px;">
            Novo
        </a>
        <h1>Lista de Usuarios</h1><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php foreach($this->model->users as $user){ ?>
            <tr>
                <td><?=$user['User_Id']?></td>
                <td><?=$user['user_nome']?></td>
                <td><?=$user['user_email']?></td>
                <td><?=$user['Profile_Id']?></td>
                <td>
                    <a href="<?=HOME_URI?>/users/edit/<?=$user['User_Id']?>" class="icon-edit"></a>
                     <a href="<?=HOME_URI?>/users/delete/<?=$user['User_Id']?>" class="icon-excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')"></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
