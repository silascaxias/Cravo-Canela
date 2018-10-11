<?php if (!defined('ABSPATH')) exit; ?>

<!-- Menu para usuários logados -->
<?php if ($this->logged_in): ?>
<div  class="row profile">
    <div class="col-md-3">
        <div class="profile-sidebar">
           <?php foreach($this->model->userImg as $pic) { ?>
                <div class="profile-userpic">
                    <center>
                        <figure>
                            <img src="<?=$pic['src']?>" alt="<=$pic['Titulo']?>" class="img-responsive">
                        </figure>
                    </center>
                </div>
            <?php } ?>
            
            <hr>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    <?=$_SESSION['userdata']['user_nome']?>
                </div>
            </div>
            <hr>
            <div class="mx-auto">
                <ul id="menu_admin">
                    <li style="margin-bottom: 25px">
                        <a href="<?=HOME_URI?>/users">
                            <img src="<?=HOME_URI?>/views/img/icon/admin.png" alt="">
                        </a>
                    </li>
                    <li style="margin-bottom: 25px">
                        <a href="<?=HOME_URI?>/cliente">
                            <img src="<?=HOME_URI?>/views/img/icon/casal.png" alt="">
                        </a>
                    </li>
                    <li style="margin-bottom: 25px">
                        <a href="<?=HOME_URI?>/list">
                            <img src="<?=HOME_URI?>/views/img/icon/evento.png" alt="">
                        </a>
                    </li>
                    <li style="margin-bottom: 25px">
                        <a href="<?=HOME_URI?>/product">
                            <img src="<?=HOME_URI?>/views/css/icons/product.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php endif;?>