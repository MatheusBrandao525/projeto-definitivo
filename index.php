<?php
    session_start();
    
        include 'cabecalho.html';
        include 'conexao.php';
        include 'menu.php';
        include 'menu_2.php';
        include 'slider.php';

        $consulta = $cn->query('select nome_produto, id_produto, imagen_produto, descricao, qnt_estoque, vl_produto  from vw_produtos');
       
    ?>
<body>

<style>
    *{
        scroll-behavior: smooth;
    }
</style>


    <div class="container" id="produtos" style="margin-top: 3px;">
        <div class="row text-center">
        <?php  while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-sm-4" style="margin-bottom: 8px;">
                <img src='imgem/<?php echo $exibe["imagen_produto"]; ?>' class="card-img-top img-responsive" style="width: 100%;">
                <h3><b><?php echo mb_strimwidth($exibe['nome_produto'],0,25,'...'); ?></b></h3>
                <span style="font-size: 20px; color: rgb(24, 24, 24); font-weight: bolder;">R$ <?php echo number_format($exibe['vl_produto'],2,',','.'); ?></span>
                
                <a href="detalhes.php?id=<?php echo $exibe['id_produto']; ?>" style="text-decoration:none;">
                    <button type="button" class="btn btn-info btn-block" style="margin-bottom: 5px;">Detalhes</button>
                </a>

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
                        <a href="carrinho.php" style="text-decoration:none;">
                            <button type="button" class="btn btn-success btn-block">Adicionar ao Carrinho</button>
                        </a>
                    <?php } else { ?>
                        <a href="" style="text-decoration:none;">
                            <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div><!--col-sm-4-->
        <?php } ?>

        </div><!--Row-->
    </div><!--container-->

    <div class="container-fluid" style="background-color: rgb(111, 120, 129); border-top: 2px solid rgb(27, 26, 26);">
        <H1 class="text-center"></H1>
        <div class="row text-center">
            <div class="col-sm-4">
                <img class="card-img-top" src="imgem/" alt="">
                <H1 class="titulo" style="font-size: 22px; color: rgb(0, 0, 0);">Sapatos</H1>
            </div>

            <div class="col-sm-4">
                <img class="card-img-top" src="imgem/" alt="">
                <H1 class="titulo" style="font-size: 22px; color: rgb(0, 0,0);">Relógios</H1>
            </div>

            <div class="col-sm-4">
                <img class="card-img-top" src="imgem/" alt="">
                <H1 class="titulo" style="font-size: 22px; color: rgb(0, 0, 0);">Jóias</H1>
            </div>
        </div>
    </div>

</body>
    <?php
        include 'footer.php'
    ?>
</html>