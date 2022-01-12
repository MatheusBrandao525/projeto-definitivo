<div class="container">

        <div class="direita" style="display: flex; justify-content: center;">
        
            <?php if(empty($_SESSION['ID'])) { ?>
                <div class="perfil" style="width: 33.33%; text-align: center;">
                    <i class="material-icons">
                        <a href="login.php" class="nav-link" style="color: darkgray;">manage_accounts</a>
                    </i>
                    <br>
                    <span>Perfil</span>
                </div><!--perfil-->
            <?php } else{
                    $consulta_usuario = $cn->query("select nome_usuario, ds_status from tbl_usuario where id_usuario = '$_SESSION[ID]'");
                    $exibeUsuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
                ?>
                         <div class="perfil" style="width: 33.33%; text-align: center;">
                         <i class="material-icons">
                             <a href="config_conta.php" class="nav-link" style="color: darkgray;">manage_accounts</a>
                         </i>
                         <br>
                         <span> <?php echo $exibeUsuario['nome_usuario'];?></span>
                     </div><!--perfil-->
                <?php } ?>
            
            <div class="carrinho" style="width: 33.33%; text-align: center;">
                <i class="material-icons">
                    <a href="carrinho.php" class="nav-link" style="color: darkgray;">shopping_cart</a>
                </i>
                <br>
                <span>Carrinho</span>
            </div><!--carrinho-->

            <?php if(empty($_SESSION['ID'])) { ?>

                <div class="entrar" style="width: 33.33%; text-align: center;">
                <i class="material-icons">
                    <a href="login.php" class="nav-link" style="color: darkgray;"> login</span></a>
                </i>
                <br>
                <span>Entrar</span>
            </div><!--entrar-->

            <?php }else{ 
                $consulta_usuario = $cn->query("select nome_usuario from tbl_usuario where id_usuario = '$_SESSION[ID]'");
                $exibeUsuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="sair" style="width: 33.33%; text-align: center;">
                <i class="material-icons">
                    <a href="sair.php" class="nav-link" style="color: darkgray;"> logout</span></a>
                </i>
                <br>
                <span>Sair</span>
            </div><!--sair-->
            <?php } ?>

        </div><!--direita-->
    </div>

    <div class="container-fluid" style="background-color: slategray; height: 100%; padding-top:8px; padding-bottom:5px;">
        <div>
            <form action="/index.php" class="form-inline" style=" justify-content: center; text-align: center;">
                <input type="text" class="form-control mr-sm-2" style=" width:350px; margin-right: 2%; margin-bottom:4px;" placeholder="Procurar...">
                <button class="btn btn-success" type="submit">Procurar</button>
            </form>
        </div>

    </div><!--barra_de_pesquisa-->


<!--
    <span class="material-icons">
    place
    </span>
-->