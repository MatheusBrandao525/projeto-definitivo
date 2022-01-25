<?php
    session_start();
        include 'conexao.php';
        include 'cabecalho.html';
        include 'menu.php';
        include 'menu_2.php';

        $cd_produto = $_GET['id'];
        
        $consulta = $cn->query("select nome_produto,nome_categoria, imagen_produto, descricao, qnt_estoque, vl_produto from vw_produtos where id_produto= '$cd_produto' ");
    ?>
<body>
        <div class="container tituloDetalhes">
            <h1>Detalhes do produto</h1>
        </div>
    <section class="container corpoDetalhes">
    <?php $exibe = $consulta->fetch(PDO::FETCH_ASSOC); { ?>
        <div class="w50">
            <img class="imgPrincipal" src='imgem/<?php echo $exibe["imagen_produto"]; ?>' alt="">
        </div><!--w50-->
        <div class="w50 detales">
            <div class="centralizar">
            <div>
                <h2><?php echo $exibe ['nome_produto']; ?></h2>
            </div>
            <div>
                <h5>Categoria: <?php echo $exibe['nome_categoria']; ?></h5>
            </div>
            <div>
                <h5>Descrição</h5>
                <p><?php echo $exibe['descricao']; ?></p>
            </div>
            <div>
                <span>Quantidade em estoque: <?php echo $exibe['qnt_estoque'];?></span>
            </div>
            <div>
                <h3>R$ <?php echo number_format($exibe['vl_produto'],2,',','.'); ?></h3>
            </div>
            <div class="botoesDetalhes">

            <?php if(empty($_SESSION['ID'])) { ?>
                    <?php if($exibe['qnt_estoque'] > 0) {?>
                        <a href="login.php" style="text-decoration:none;">
                            <button type="button" class="btn btn-success btn-block">Adicionar ao Carrinho</button>
                        </a>
                        <a href="index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                    <?php } else { ?>
                        <a href="" style="text-decoration:none;">
                            <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                        </a>
                        <a href="index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                    <?php } ?>
                <?php }else { ?>
                    <?php if($exibe['qnt_estoque'] > 0) {?>
                        <a href="carrinho.php" style="text-decoration:none;">
                            <button type="button" class="btn btn-success btn-block">Adicionar ao Carrinho</button>
                        </a>
                        <a href="index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                    <?php } else { ?>
                        <a href="" style="text-decoration:none;">
                            <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                        </a>
                        <a href="index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                    <?php } ?>
                <?php } ?>

            </div>
            </div>
        </div><!--w50-->
        <?php } ?>
    </section>
</body>

<?php

include 'footer.php'

?>
