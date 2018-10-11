<?php if (!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$this->title?> - Cravo&Canela</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=HOME_URI?>/views/css/framework.css?v=<?=uniqid()?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=HOME_URI?>/views/css/main.css?v=<?=uniqid()?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=HOME_URI?>/views/css/fontawesome/fontawesome-all.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=HOME_URI?>/views/css/estilo/estilo.css">      
    <script src="<?=HOME_URI?>/views/js/main.js?v=<?=uniqid()?>"></script>
    <script src="<?=HOME_URI?>/views/_includes/lib_canvas/canvasjs.min.js?v=<?=uniqid()?>"></script>


    <link rel="stylesheet" type="text/css" href="<?=HOME_URI?>/views/css/estilo/estilo.css">
    <link rel="stylesheet" type="text/css" href="<?=HOME_URI?>/views/css/estilo/admin.estilo.css">

    <!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/Cravo&Canela/views/javascript/estilo.js" type="text/javascript" charset="utf-8" async defer></script>

</head>


    <header class="menu">
            <img src="/Cravo&Canela/views/img/logo.png" class="float-left logo">
        <nav class="navbar navbar-expand-lg navbar-light float-right menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=HOME_URI?>/home/">Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=HOME_URI?>/QuemSomos/">Quem Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=HOME_URI?>/listas/">Lista de Casamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Cravo&Canela/views/contato/index.php">Contato</a>
                    </li>
                    <li>
                     <?php if($this->logged_in){?> 
                        <a href="?sair=sim">
                            <a href="<?=HOME_URI?>/login/exit" class="button danger">Sair</a> 
                        </a>                
                    <?php }else{ ?>
                        <a href="?sair=sim">
                            <a href="<?=HOME_URI?>/login" class="nav-link">Área do Admin</a> 
                        </a>
                    <?php }    ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <body>