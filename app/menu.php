<?php
    require "../admin/conexao.php"; // incluindo arquivo de conexão.
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../public/assets/js/jQuery.js"></script>
<script src="../public/assets/js/master.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../public/assets/style/style.css">

<script src="https://kit.fontwesome.com/a076d05399.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
<link rel = " stylesheet " href = " https://use.fontawesome.com/079d72ad8e.css " >

<script src="../public/assets/jquery.mask.js"></script>

    <title>Talisma</title>
</head>
<nav id="menu-top">
<label class="logo">Talisma</label>

    <div class="controls">
        <div class="alinharAdireita">
            <?php if(empty($_SESSION['ID'])) { ?>
                <div class="perfil iconesMenuTop">
                        <a href="../app/login.php" class="nav-link">
                            <i class="material-icons">manage_accounts</i>
                            <span>Perfil</span>
                        </a>
                </div><!--perfil-->
            <?php } else{
                    $consulta_usuario = $cn->query("select nome_usuario, ds_status from tbl_usuario where id_usuario = '$_SESSION[ID]'");
                    $exibeUsuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
                ?>
                        <div class="perfil iconesMenuTop">
                            <a href="../app/config_conta.php" class="nav-link">
                                <i class="material-icons">manage_accounts</i>
                                <span> <?php echo $exibeUsuario['nome_usuario'];?></span>
                            </a>
                    </div><!--perfil-->
                <?php } ?>

                <div class="listaDesejo iconesMenuTop">
                    <a href="../app/listaDesejos.php" class="nav-link">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                        <span>Salvos</span>
                    </a>
                </div><!--carrinho-->          

            
            <div class="carrinho iconesMenuTop">
                    <a href="../app/carrinho.php" class="nav-link">
                        <i class="material-icons"> shopping_cart</i>
                        <span>Carrinho</span>
                    </a>
            </div><!--carrinho-->

            <?php if(empty($_SESSION['ID'])) { ?>

                <div class="entrar iconesMenuTop">
                    <a href="../app/login.php" class="nav-link">
                        <i class="material-icons"> login</i>
                        <span>Entrar</span>
                    </a>
            </div><!--entrar-->

            <?php }else{ 
                $consulta_usuario = $cn->query("select nome_usuario from tbl_usuario where id_usuario = '$_SESSION[ID]'");
                $exibeUsuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="sair iconesMenuTop">
                    <a href="../app/sair.php" class="nav-link">
                        <i class="material-icons"> logout</i>
                        <span>Sair</span>
                    </a>
            </div><!--sair-->
            <?php } ?>
            </div>
            
        </div>
        <div class="limpa"></div>
</nav>
