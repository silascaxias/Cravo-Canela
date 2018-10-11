<div class="col-md-9">
                <div class="profile-content">
                    <a href="?sair=sim">
                        <a href="<?=HOME_URI?>/cliente/index?>" class="button back small float-right">Voltar</a>
                    </a>
                    <hr style="margin-top: 50px">
                    <h1>Adicionar novo cliente</h1>
                    <hr>
                    <form action="<?=HOME_URI?>/cliente/save/<?=$this->model->cliente['couple_id']?>" method="post"s style="padding-left: 65px">
                        <div class="form-group">
                            <input type="text" name="couple_nome" class="forme_control larger" id="campo_nome" value="<?=$this->model->cliente['couple_nome']?>" style="width: 300px;">
                        </div>
                        <div class="form-group">
                            <input type="email" name="couple_email" class="forme_control larger" id="campo_email" value="<?=$this->model->cliente['couple_email']?>" style="width: 300px;">
                        </div>
                        <div class="form-group">                    
                            <input type="tel" name="couple_tell" class="forme_control larger" id="campo_tel" value="<?=$this->model->cliente['couple_tell']?>" style="width: 250px;">
                        </div>
                        <div class="form-group">
                            <input type="date" name="couple_date" class="form_control larger" value="<?=$this->model->cliente['couple_date']?>" style="width: 200px;">
                        </div>
                        <!--<div class="form-group" id="Images">
                            
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
                        </div>-->
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

<!--<script>
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
        </script>-->