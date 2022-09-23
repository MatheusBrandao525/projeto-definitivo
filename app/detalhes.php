<?php
    session_start();
    require "../admin/conexao.php"; // incluindo arquivo de conexão.
    require '../app/menu.php';
    require '../app/menu-principal.php';

        $id_produto = $_GET['id'];
        
        $consulta = $cn->query("select * from tbl_produto where id_produto= '$id_produto' ");
    ?>
<body class="body">
        <div class="container tituloDetalhes">
            <h1>Detalhes do produto</h1>
        </div>
    <section class="row w100">
        <div class="container corpoDetalhes">
        <?php $exibe = $consulta->fetch(PDO::FETCH_ASSOC); { ?>
        <div class="col-sm-9 displayFlex">
            <div>

                <div class="row imagem displayFlex">
                    <div class="col-sm-1">
                        <div class="wishList marginTop">
                            <span class="iconDetalhe"><i class="fa fa-heart" aria-hidden="true"></i></span>
                        </div>
                        <div class="wishList marginTop">
                            <span class="iconDetalhe"><i class="fa fa-share-alt" aria-hidden="true"></i></span> 
                        </div>
                    </div>
                    <div class="col-sm-11 displayFlex">
                        <img class="imgPrincipal" src='../public/assets/imgem/<?php echo $exibe["imagen_produto"]; ?>' alt="">
                    </div>
                </div>
                <div class="displayFlex marginTop">
                    <div class="displayFlex justy">
                        <div class="imgp">
                            <img class="imgPrincipal" src='../public/assets/imgem/<?php echo $exibe["imagen_produto"]; ?>' alt="">
                        </div>
                        <div class="imgp">
                            <img class="imgPrincipal" src='../public/assets/imgem/<?php echo $exibe["imagen_produto"]; ?>' alt="">
                        </div>
                        <div class="imgp">
                            <img class="imgPrincipal" src='../public/assets/imgem/<?php echo $exibe["imagen_produto"]; ?>' alt="">
                        </div>
                        <div class="imgp">
                            <img class="imgPrincipal" src='../public/assets/imgem/<?php echo $exibe["imagen_produto"]; ?>' alt="">
                        </div>
                    </div>
                </div>
                <div >

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
                <div class="stars">
                    <span><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i> </span>
                    <span>  50 Opiniões</span>
                </div>

                <div class="marginTop">
                    <h3>R$ <?php echo number_format($exibe['vl_produto'],2,',','.'); ?></h3>
                </div>
                <div>
                    <span>Até 10x no cartão</span>
                </div>

                <div>
                    <span>Frete: R$ 00,00</span>
                </div>

                <div class="marginTop">
                    <span>Calcular frete</span>
                    <form action="#" method="post">
                        <input type="text" class="formCep" id="cepFrete" placeholder="Insira seu CEP">
                        <button type="subimit" class="btn btn-info btn-block calculaFrete">Calcular</button>
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
                            <a class="linkdecoration" href="../app/login.php">
                                <button type="button" class="btn btn-success btn-block btnDetalhes">Adicionar ao Carrinho</button>
                            </a>
                            <a href="../public/index.php" class="btn btn-danger btn-block voltar btnDetalhes">Voltar</a>
                        <?php } else { ?>
                            <a class="linkdecoration" href="">
                                <button type="button" class="btn btn-danger btn-block btnDetalhes" disabled >Produto indisponivel</button>
                            </a>
                            <a href="../public/index.php" class="btn btn-danger btn-block voltar btnDetalhes">Voltar</a>
                        <?php } ?>
                    <?php }else { ?>
                        <?php if($exibe['qnt_estoque'] > 0) {?>
                            <a class="btn btn-success btn-block linkdecoration" href='../app/carrinho.php?id=<?php echo $exibe["id_produto"];?>'>Adicionar ao Carrinho</a>
                            <a href="../public/index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                        <?php } else { ?>
                            <a class="linkdecoration" href="">
                                <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                            </a>
                            <a href="../public/index.php" class="btn btn-danger btn-block voltar">Voltar</a>
                        <?php } ?>
                    <?php } ?>

                </div><!-- botõesDetalhes -->
            </div><!-- centralizar -->
        </div><!--w50-->
        </div>
        <div class="container segundaParteDetalhes">
            <div class="row w100">
                <div class="col-sm-9 descricaoDetales">
                    <h5 class="text-center marginTop">Descrição</h5>
                    <p><?php echo $exibe['descricao']; ?></p>
                </div>
                <div class="col-sm-3 bordaEsquerda">

                <div class="tituloPergunta">
                    <h4>perguntas</h4>
                </div>
                <div class="formularioPergunta">
                    <form action="#">
                        <label for="">Faça sua pergunta</label>
                        <textarea name="pergunta" id="pergunta" cols="31" rows="2"></textarea>
                        <button class="btn btn-info btn-block">Enviar</button>
                    </form>
                </div>
                <div class="pergunta">
                    <span>pergunta?</span>
                    <?php if(isset($_SESSION['ID'])){
                        if($_SESSION['ID'] ==1){ ?>
                    <div class="botaoPergunta">
                        <button class="btn botaoResponde">Responder</button>
                    </div>
                    <?php }}else{ ?>
                    <div class="botaoPergunta">
                        <button class="btn botaoResponde">Ver respostas</button>
                    </div>
                    <?php } ?>
                </div>

                <div class="pergunta">
                    <span>pergunta?</span>
                    <?php if(isset($_SESSION['ID'])){
                        if($_SESSION['ID'] ==1){ ?>
                    <div class="botaoPergunta">
                        <button class="btn botaoResponde">Responder</button>
                    </div>
                    <?php }}else{ ?>
                    <div class="botaoPergunta">
                        <button class="btn botaoResponde">Ver respostas</button>
                    </div>
                    <?php } ?>
                </div>

                <div class="pergunta">
                    <span>pergunta?</span>
                    <?php if(isset($_SESSION['ID'])){
                        if($_SESSION['ID'] ==1){ ?>
                    <div class="botaoPergunta">
                        <button class="btn botaoResponde">Responder</button>
                    </div>
                    <?php }}else{ ?>
                    <div class="botaoPergunta">
                        <button class="btn botaoResponde">Ver respostas</button>
                    </div>
                    <?php } ?>
                </div>

                <div class="pergunta">
                    <span>pergunta?</span>
                    <?php if(isset($_SESSION['ID'])){
                        if($_SESSION['ID'] ==1){ ?>
                    <div class="botaoPergunta">
                        <button class="btn botaoResponde">Responder</button>
                    </div>
                    <?php }}else{ ?>
                    <div class="botaoPergunta">
                        <button class="btn botaoResponde">Ver respostas</button>
                    </div>
                    <?php } ?>
                </div>

                </div>
            </div><!-- row -->
        </div><!-- SegundaParteDetalhes -->
        <?php } ?>

        <div class="container produtosSemelhantes w100">
            <h4 class="text-center">Produtos semelhantes</h4>
            <div class="row displayProdSemelhantes">
                <div class="col-sm-2">
                    <div class="carProduto">
                        <a href="">
                        <div class="carImagem">
                            <img class="imagemProdSemelhante" src="imgem/1d9a1f89ae399e550f82c85e8dec3192.jpg" alt="">
                        </div>
                        <h5 class="carNomeProd">Nome Produto</h5>
                        <div class="preco">
                            <span>R$ 00,00</span>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="carProduto">
                    <div class="carImagem">
                            <img class="imagemProdSemelhante" src="imgem/1d9a1f89ae399e550f82c85e8dec3192.jpg" alt="">
                        </div>
                        <h5 class="carNomeProd">Nome Produto</h5>
                        <div class="preco">
                            <span>R$ 00,00</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="carProduto">
                    <div class="carImagem">
                            <img class="imagemProdSemelhante" src="imgem/1d9a1f89ae399e550f82c85e8dec3192.jpg" alt="">
                        </div>
                        <h5 class="carNomeProd">Nome Produto</h5>
                        <div class="preco">
                            <span>R$ 00,00</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="carProduto">
                    <div class="carImagem">
                            <img class="imagemProdSemelhante" src="imgem/1d9a1f89ae399e550f82c85e8dec3192.jpg" alt="">
                        </div>
                        <h5 class="carNomeProd">Nome Produto</h5>
                        <div class="preco">
                            <span>R$ 00,00</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="carProduto">
                    <div class="carImagem">
                            <img class="imagemProdSemelhante" src="imgem/1d9a1f89ae399e550f82c85e8dec3192.jpg" alt="">
                        </div>
                        <h5 class="carNomeProd">Nome Produto</h5>
                        <div class="preco">
                            <span>R$ 00,00</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="carProduto">
                    <div class="carImagem">
                            <img class="imagemProdSemelhante" src="imgem/1d9a1f89ae399e550f82c85e8dec3192.jpg" alt="">
                        </div>
                        <h5 class="carNomeProd">Nome Produto</h5>
                        <div class="preco">
                            <span>R$ 00,00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
	
	
	
    $(document).ready(function(){
        
    $('#cepFrete').mask('00.000-000', {reverse: true});
        
    });
        
</script>
</body>

<?php

require '../app/footer.php'

?>
