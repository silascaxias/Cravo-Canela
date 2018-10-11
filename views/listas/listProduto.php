<hr><br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light barra">
					<p>Noivos - Ariane Citelli & Thomaz Brancati</p>
				</nav>
					<div class="col-md-3">
						<?php foreach($this->model->produto as $prod) { ?>
							<div class="card-deck">
						  		<div class="card">
						    		<div class="card-body">
						    			
						      			<p class="card-text"><?=$prod[0]['descript_product']?></p>
						      			<center><button type="button" class="btn btn-warning"><?=$prod[0]['price_product']?></button></center>	
						    		</div>
						    	</div>
						  	</div>
						<?php } ?>
						</div>
			</div>
		</div>
	</div>
	<br>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>