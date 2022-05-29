<?php

    include "conexao.php"; // incluindo arquivo de conexão.
?>
<nav id="menu-top">
<label class="logo">Minha Loja</label>

    <div class="controls">
                <div class="alinharAdireita">
            <?php if(empty($_SESSION['ID'])) { ?>
                <div class="perfil iconesMenuTop">
                        <a href="login.php" class="nav-link">
                            <i class="material-icons">manage_accounts</i>
                            <span>Perfil</span>
                        </a>
                </div><!--perfil-->
            <?php } else{
                    $consulta_usuario = $cn->query("select nome_usuario, ds_status from tbl_usuario where id_usuario = '$_SESSION[ID]'");
                    $exibeUsuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
                ?>
                        <div class="perfil iconesMenuTop">
                            <a href="config_conta.php" class="nav-link">
                                <i class="material-icons">manage_accounts</i>
                                <span> <?php echo $exibeUsuario['nome_usuario'];?></span>
                            </a>
                    </div><!--perfil-->
                <?php } ?>


            
            <div class="carrinho iconesMenuTop">
                    <a href="carrinho.php" class="nav-link">
                        <i class="material-icons"> shopping_cart</i>
                        <span>Carrinho</span>
                    </a>
            </div><!--carrinho-->

            <?php if(empty($_SESSION['ID'])) { ?>

                <div class="entrar iconesMenuTop">
                    <a href="login.php" class="nav-link">
                        <i class="material-icons"> login</i>
                        <span>Entrar</span>
                    </a>
            </div><!--entrar-->

            <?php }else{ 
                $consulta_usuario = $cn->query("select nome_usuario from tbl_usuario where id_usuario = '$_SESSION[ID]'");
                $exibeUsuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="sair iconesMenuTop">
                    <a href="sair.php" class="nav-link">
                        <i class="material-icons"> logout</i>
                        <span>Sair</span>
                    </a>
            </div><!--sair-->
            <?php } ?>
            </div>
            
        </div>
        <div class="limpa"></div>
</nav>
