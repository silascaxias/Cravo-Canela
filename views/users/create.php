<div class="col-md-9">
                <div class="profile-content">
                    <a href="?sair=sim">
                        <a href="<?=HOME_URI?>/users/index?>" class="button back small float-right">Voltar</a>
                    </a>
                    <hr style="margin-top: 50px">
                    <h1>Adicionar Novo Usuario</h1>
                    <hr>
                    <form action="<?=HOME_URI?>/users/save" method="post" enctype="Multipart/form-data" style="padding-left: 65px">
                        <div class="form-group">
                            <input type="text" name="user_nome" class="forme_control larger" id="campo_nome" placeholder="Nome" style="width: 300px;">
                        </div>
                        <div class="form-group">
                            <input type="email" name="user_email" class="forme_control larger" id="campo_email" placeholder="E-mail" style="width: 300px;">
                        </div>
                        <div class="form-group">                    
                            <input type="password" name="user_senha" class="forme_control larger" id="campo_senha" placeholder="Senha" style="width: 250px;">
                        </div>
                        <div class="form-group" style="width: 200px">
                            <select class="form-control" name="Profile_Id">
                            <option value="0">Selecione um perfil</option>
                            <?php foreach($this->model->profiles as $profile) { ?>
                                <option value="<?=$profile['Profile_Id']?>">
                                <?=$profile['Description']?>
                                </option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form_group" id="Images">
                            <input type="file" name="Image[]" id="Image_1" accept="image/png, image/jpeg" class="form_control_file">
                            <label for="Image_1" class="display_block">Imagem Perfil</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Salvar" class="button success ripple"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script>
            var added = 1;
            var Image_1 = document.getElementById('Image_1');
            Image_1.addEventListener('change', onAddedFile);
            function onAddedFile() {
                var divImages = document.getElementById('Images');
                var convertedElement = getTemplate(++added);
                convertedElement[0].addEventListener('change', onAddedFile);
                convertedElement[0].addEventListener('change', Components.FormControlFile.OnChangeHandler.bind(convertedElement[0]));
                divImages.appendChild(convertedElement[0]);
                divImages.appendChild(convertedElement[0]);
            }

            function getTemplate(id) {
                return createElementsFromHTML('<input type="file" name="Image[]" id="Image_' + id + '" accept="image/png, image/jpeg" class="form_control_file"><label class=" display_block mg-t-10" for="Image_' + id + '">Anexar arquivo</label>');
            }
</script>