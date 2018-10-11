<div class="col-md-9">
                <div class="profile-content">
                    <a href="?sair=sim">
                        <a href="<?=HOME_URI?>/users/index?>" class="button back small float-right">Voltar</a>
                    </a>
                    <hr style="margin-top: 50px">
                    <h1>Editar Usuario</h1>
                    <hr>
                    <form action="<?=HOME_URI?>/users/save/<?=$this->model->user['User_Id']?>" method="post" style="padding-left: 65px">
                        <div class="form-group">
                            <input type="text" name="user_nome" class="forme_control larger" id="campo_nome" placeholder="Nome" value="<?=$this->model->user['user_nome']?>" style="width: 300px;">
                        </div>
                        <div class="form-group">
                            <input type="email" name="user_email" class="forme_control larger" id="campo_email" placeholder="E-mail" value="<?=$this->model->user['user_email']?>" style="width: 300px;">
                        </div>
                        <div class="form-group">                    
                            <input type="password" name="user_senha" class="forme_control larger" id="campo_senha" value="<?=$this->model->user['user_senha']?>" placeholder="Senha" style="width: 250px;">
                        </div>
                        <div class="form-group" style="width: 200px">
                            <select class="form-control" name="Profile_Id">
                            <option value="0">Selecione um perfil</option>
                            <?php foreach($this->model->profiles as $profile) { ?>
                                <option value="<?=$profile['Profile_Id']?>" <?=$this->model->user['Profile_Id'] == $profile['Profile_Id'] ? 'selected' : '' ?>>
                            <?=$profile['Description']?>
                             </option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" id="Images">
                            
                        <label for="Image_1" class="display_block">Imagem Produto</label>
                        <?php foreach($this->model->imagem as $pic) { ?>
                         <div class="card-img"  style="width: 12rem;float: left">
                            <figure>
                                <a href="<?=$pic['src']?>" target="_blank">
                                    <img src="<?=$pic['src']?>" alt="<=$pic['Titulo']?>" class="card-img-top rounded">
                                </a>
                            </figure>
                        </div>
                        <?php } ?>
                        </div>
                        <div class="form-group position_btn" >
                            <input type="submit" value="Salvar" class="button success ripple"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>