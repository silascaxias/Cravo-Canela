<div class="col-md-9">
    <div class="profile-content">
        <a href="?sair=sim">
            <a href="<?=HOME_URI?>/list/index" class="button back small float-right">Voltar</a>
        </a>
        <hr style="margin-top: 50px">
        <h1>Criar Nova Lista</h1>
        <hr>
        <div class="">
            <form action="" method="post">
                <section class="card-content">
                    <div class="form-group float-left" style="width: 200px">
                        <select class="form-control" name="couple_id">
                            <option value="-1"> Seleciona o cliente</option>
                                <?php foreach($this->model->clientes as $cliente) {?>
                                    <option value="<?=$cliente['couple_id'] ?>">
                                     <?=$cliente['couple_nome']?>
                            </option>
                                <?php } ?>
                        </select>
                    </div>
                </section>
                <input type="submit" value="Adicionar" class="button info small" style="width: 200px">
                <input type="submit" value="Remover" name="removeCli" class="button info small" style="width: 200px">
            </form>
        </div>
        <div class="">
            <form action="<?=HOME_URI?>/list/addproduct" method="post">
                <section class="card-content">
                    <div class="form-group float-left" style="width: 200px">
                        <select class="form-control" name="id_product">
                            <option value="-1"> Seleciona o Produto</option>
                                <?php foreach($this->model->produtos as $prod) {?>
                                    <option value="<?=$prod['id_product']?>">
                                <?=$prod['descript_product']?>
                            </option>
                                <?php } ?>
                        </select>
                    </div>
                </section>
                <input type="submit" value="Adicionar" class="button info small" style="width: 200px">
            </form>
            
        </div>

        <form action="<?=HOME_URI?>/list/salvarLista"  method="post">
            <input type="hidden" value="<?=$_SESSION['couple_nome']?>" name="couple_nome">
            <div class="">
                <header class="card-header flex-container align-middles">
                    <h3>Compra - <?php if($_SESSION['couple_nome'] == null)
                        echo " Sem cliente na compra!";
                    else
                        echo $_SESSION['couple_nome'];
                    ?></h3>
                </header>
                <?php if($_SESSION['produtos']):?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                            <?php foreach ($_SESSION['produtos'] as $prod) { ?>
                            <tr>
                                <td><?=$prod['id_product']?></td>
                                <td><?=$prod['descript_product']?></td>
                                <td><?=$prod['price_product']?></td>
                                <td>    
                                    <a href="<?=HOME_URI?>/list/deletar/<?=$prod['id_product']?>" class="icon-excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">Excluir</a></button>  
                                </td>
                            </tr>
                            <?php } ?>
                    <?php else:?>
                    <h3 align="center" style="margin-top: 50px;">Sem produtos na compra!</h3>
                <?php endif;?>
                </table>
                <div class="form-group" align="right" style="margin-right: 30px;">
                    <a href="<?=HOME_URI?>/list/limpar" class="button back small" onclick="return confirm('Tem certeza que deseja limpar a venda?')">Limpar</a>
                    <input type="submit" value="Salvar" class="button new small">
                </div>
            </div>        
        </form>
    </div>
</div>
