<?php
    session_start();
    

        include 'conexao.php';
            //include 'menu.php';
        include 'menu.php';
        include 'menu_2.php';
        include 'slider.php';
        include 'menu-principal.php';

        $consulta = $cn->query('select nome_produto, id_produto, imagen_produto, descricao, qnt_estoque, vl_produto  from tbl_produto');
       
    ?>
<body>

<?php 



?>

<style>
    *{
        scroll-behavior: smooth;
    }
</style>


    <div class="container" id="produtos" style="margin-top: 3px;">
        <div class="row text-center">

        <?php  while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        
            $consultaGeral = $cn->query("SELECT id_usuario, nome_usuario FROM tbl_usuario");
            $exibeUser = $consultaGeral->fetch(PDO::FETCH_ASSOC);    
            
            
            ?>

            <div class="col-sm-2" style="margin-bottom: 8px;">
            <form action="cart.php?id=<?php echo $exibe['id_produto']; ?>&idUser=<?php echo $exibeUser['id_usuario'];?>" method="post">
                <img src='imgem/<?php echo $exibe["imagen_produto"]; ?>' class="card-img-top img-responsive" style="width: 100%;">
                <h5 class="tituloProduto"><strong><b><?php echo mb_strimwidth($exibe['nome_produto'],0,25,'...'); ?></b></strong></h5>
                <span style="font-size: 20px; color: rgb(24, 24, 24); font-weight: bolder;">R$ <?php echo number_format($exibe['vl_produto'],2,',','.'); ?></span>
                
                <input type="hidden" name="nomeImg" value="<?php echo $exibe['imagen_produto'];?>">
                <input type="hidden" name="nomeProd" value="<?php echo $exibe['nome_produto'];?>">
                <input type="hidden" name="precoProd" value="<?php echo number_format($exibe['vl_produto'],2,',','.');?>">

                <a href="detalhes.php?id=<?php echo $exibe['id_produto']; ?>" style="text-decoration:none;">
                    <button type="button" class="btn btn-info btn-block" style="margin-bottom: 5px;">Detalhes</button>
                </a>


                <div class="manterbotoes">
                <?php if(empty($_SESSION['ID'])) { ?>
                    <?php if($exibe['qnt_estoque'] > 0) {?>
                        <a href="login.php" style="text-decoration:none;">
                            <button type="button" class="btn btn-success btn-block">Adicionar ao Carrinho</button>
                        </a>
                    <?php } else { ?>
                        <a href="" style="text-decoration:none;">
                            <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                        </a>
                    <?php } ?>
                <?php }else { ?>
                    <?php if($exibe['qnt_estoque'] > 0) {?>
                        <a href="" style="text-decoration:none;">
                            <button type="sibmit" name="add_to_cart" class="btn btn-success btn-block" value="">Adicionar ao Carrinho</button>
                        </a>
                    <?php } else { ?>
                        <a href="" style="text-decoration:none;">
                            <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                        </a>
                    <?php } ?>
                <?php } ?>
                </div>
                </form>
            </div><!--col-sm-4-->
        <?php } ?>

        </div><!--Row-->
    </div><!--container-->

</body>
    <?php
        include 'footer.php'
    ?>
</html>