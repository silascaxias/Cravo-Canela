<div class="col-md-9">
    <div class="profile-content">
        <a href="<?=HOME_URI?>/list/" class="button back new float-right" style="margin-bottom: 10px;">
            Voltar
        </a>
        <h1>Detalhes da Venda</h1><br>
        <section class="card-content">
    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Codigo Produto</th>
            <th>Descrição</th>
            <th>Preço</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($this->model->ver as $venda):?>
            <tr>
              <td><?=$venda['id_lista']?></td>
              <td><?=$this->descProd($venda['id_produto'])?></td>
              <td><?=$this->preProd($venda['id_produto'])?></td>
            </tr>
            
        <?php endforeach; ?>
        </tbody>
  </table>
    <a href="<?=HOME_URI?>/list/deletarLista/<?=$this->model->id?>" style="margin-top: 10px;" class="button back small" onclick="return confirm('Tem certeza que deseja deletar a venda?')">Deletar</a>
</section>
    </div>