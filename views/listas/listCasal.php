      <hr>
    
    <div class="container">
        <div class="col-md-3">
            <div class="profile-sidebar-card">
               <?php foreach($this->model->imagem as $pic) { ?>
                    <div class="profile-userpic-card">
                        <center>
                            <figure>
                                <img src="<?=$pic['src']?>" alt="<=$pic['Titulo']?>" class="img-responsive">
                            </figure>
                        </center>
                    </div>
                <?php } ?>

                
                <hr>
                <?php foreach($this->model->cliente as $nome) { ?>
                <div class="card">
                    <div class="card-body">
                        <div class="profile-usertitle-card">
                            <div class="profile-usertitle-name">                               
                               <center><h4 class="card-title"><?=$nome['couple_nome']?></h4></center>
                            </div>
                        </div>
                    </div>
                    <center>
                <a href="<?=HOME_URI?>/list/listProduct/<?=$nome['couple_id']?>" class="button back new" style="margin-bottom: 10px;">Ver Lista</a>
                </center>
                </div>

                <hr>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer>
        <div class="row rodape">
            <div class="col-md-5 end">
                <ul>
                    <li><img src="/Cravo&Canela/views/img/icon/location.png">Rua Mogi Mirim, N° 416, Conchal/SP</li>
                    <li><img src="/Cravo&Canela/views/img/icon/telefone.png">(19)3866-5355</li>
                    <li><img src="/Cravo&Canela/views/img/icon/open.png">Aberto de Segunda a Sábado</li>
                </ul>
            </div>
                <hr class="linha_vertical">
            <div class="col-md-5 red">
                <ul>
                    <li>Siga a gente nas redes sociais</li>
                    <li style="padding-left: 70px;">
                        <a href="https://pt-br.facebook.com/www.cravoecanelapresentes.com.br/"><img src="/Cravo&Canela/views/img/icon/facebook.png" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
