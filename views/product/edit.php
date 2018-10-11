<div class="col-md-9">
                <div class="profile-content">
                    <a href="?sair=sim">
                        <a href="<?=HOME_URI?>/product/index?>" class="button back small float-right">Voltar</a>
                    </a>
                    <hr style="margin-top: 50px">
                    <h1>Editar Produto</h1>
                    <hr>
                    <form action="<?=HOME_URI?>/product/save/<?=$this->model->product['id_product']?>" method="post" style="padding-left: 65px">
                        <div class="form-group">
                            <input type="text" name="descript_product" class="forme_control larger" id="campo_nome" placeholder="Nome" value="<?=$this->model->product['descript_product']?>" style="width: 300px;">
                        </div>
                        <div class="form-group">
                            <input type="text" name="price_product" class="forme_control larger" id="campo_email" placeholder="" value="<?=$this->model->product['price_product']?>" style="width: 300px;">
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
                        <div class="form-group position_btn">
                            <input type="submit" value="Salvar" class="button success ripple"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>