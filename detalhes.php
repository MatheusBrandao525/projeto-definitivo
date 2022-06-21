<?php
    session_start();
        include 'conexao.php';
        include 'menu.php';
        include 'menu_2.php';

        $id_produto = $_GET['id'];
        
        $consulta = $cn->query("select * from tbl_produto where id_produto= '$id_produto' ");
    ?>
<body>
        <div class="container tituloDetalhes">
            <h1>Detalhes do produto</h1>
        </div>
    <section class="row ">
        <div class="container corpoDetalhes">
        <?php $exibe = $consulta->fetch(PDO::FETCH_ASSOC); { ?>
        <div class="col-sm-9 displayFlex">
            <div>
                <div class="imagem displayFlex">
                    <img class="imgPrincipal" src='imgem/<?php echo $exibe["imagen_produto"]; ?>' alt="">
                </div>
                <div>
                    <h5>Descrição</h5>
                    <p><?php echo $exibe['descricao']; ?></p>
                </div>
            </div>
        </div><!--w50-->
        <div class="col-sm-3 detales">
            <div class="centralizar">
                <div class="inform">
                    <span>Novo</span>
                    <span> | </span>
                    <span>100 vendidos</span>
                </div>
                <div class="marginTop">
                    <h2><?php echo $exibe ['nome_produto']; ?></h2>
                </div>
                <div class="stars marginTop">
                    <span><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i> </span>
                    <span>  50 Opiniões</span>
                </div>


                <div class="marginTop">
                    <span>Quantidade em estoque: <?php echo $exibe['qnt_estoque'];?></span>
                </div>
                <div class="marginTop">
                    <h3>R$ <?php echo number_format($exibe['vl_produto'],2,',','.'); ?></h3>
                </div>
                <div>
                    <span>Até 10x no cartão</span>
                </div>

                <div class="marginTop">
                    <span>Calcular frete</span>
                    <form action="#" method="post">
                        <input type="text" placeholder="CEP">
                    </form>
                </div>

                <div class="marginTop">
                    <span>Cor: Azul</span>
                </div>

                <div class="marginTop">
                    <span>Quantidade em estoque: <?php echo $exibe['qnt_estoque'];?></span>
                </div>

                <div class="botoesDetalhes marginTop">

                <?php if(empty($_SESSION['ID'])) { ?>
                        <?php if($exibe['qnt_estoque'] > 0) {?>
                            <a class="linkdecoration" href="login.php">
                                <button type="button" class="btn btn-success btn-block">Adicionar ao Carrinho</button>
                            </a>
                            <a href="index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                        <?php } else { ?>
                            <a class="linkdecoration" href="">
                                <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                            </a>
                            <a href="index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                        <?php } ?>
                    <?php }else { ?>
                        <?php if($exibe['qnt_estoque'] > 0) {?>
                            <a class="btn btn-success btn-block linkdecoration" href='carrinho.php?id=<?php echo $exibe["id_produto"];?>'>Adicionar ao Carrinho</a>
                            <a href="index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                        <?php } else { ?>
                            <a class="linkdecoration" href="">
                                <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                            </a>
                            <a href="index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                        <?php } ?>
                    <?php } ?>

                </div><!-- botõesDetalhes -->
            </div><!-- centralizar -->
        </div><!--w50-->
        <?php } ?>
                        </div>
    </section>
</body>

<?php

include 'footer.php'

?>
