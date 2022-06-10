<?php
    session_start(); // iniciando a sessão.
    include 'conexao.php'; // incluindo o arquivo de conexão com o banco de dados.
    include 'menu.php'; // incluindo um menu.
    include 'menu_2.php'; // incluindo o segundo menu.
    include 'slider.php'; // incluindo o sistema de slide.
    include 'menu-principal.php';
    
    $cat = $_GET['cat']; // variavel que recebe a categoria do produto.

    // criando uma consulta no banco de dados, e, armazenando os dados na variavel $Consulta.
    $consulta = $cn->query("select nome_produto, id_produto, imagen_produto, descricao, qnt_estoque, vl_produto  from tbl_produto where id_categoria = '$cat'");
?>

<style>
    *{
        scroll-behavior: smooth;
    }
</style>

<div class="container" id="produtos" style="margin-top: 3px;">
        <div class="row text-center">

        <!--Enquanto a variavel $xibe estiver recebendo dados da variavel $consulta, execute o seguinte codigo.-->
        <?php  while($exibir = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>

            <div class="col-sm-2" style="margin-bottom: 8px;">

                <img src='imgem/<?php echo $exibir["imagen_produto"]; ?>' class="card-img-top img-responsive" style="width: 100%;"> <!--Responsavel por exibir a imagem do produto-->

                <h5><b><?php echo mb_strimwidth($exibir['nome_produto'],0,25,'...'); ?></b></h5> <!--Responsavel por exibir o nome do produto-->

                <span style="font-size: 20px; color: rgb(24, 24, 24); font-weight: bolder;">R$ <?php echo number_format($exibir['vl_produto'],2,',','.'); ?></span> <!--Responsavel por exibir o preço do produto-->
                
                <a class="btn btn-info btn-block btndetalhes" href="detalhes.php?id=<?php echo $exibir['id_produto']; ?>">Detalhes</a> <!--Botão de detalhes-->

                <div class="manterbotoes">
                <?php if(empty($_SESSION['ID'])) { ?> <!--Verificando, se a sessão ID estiver vazia entao..-->
                    <?php if($exibir['qnt_estoque'] > 0) {?> <!--Verificando se a quantidade do produto em estoque é maior que zero-->
                        <a href="login.php" style="text-decoration:none;"> <!--Se a sessão ID não estiver setada entao o usuario ao clicar em adicionar ao carrinho é redirecionado para a pagina de login-->
                            <button type="button" class="btn btn-success btn-block">Adicionar ao Carrinho</button>
                        </a>
                    <?php } else { ?> <!--Se a quantidade em estoque for zero então o botão produto indisponivel é adicionado no lugar do botão adicionar ao carrinho -->
                        <a href="" style="text-decoration:none;">
                            <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                        </a>
                    <?php } ?>
                <!--Se a sessão ID estiver setada então execute o seguinte codigo.-->
                <?php } else { ?>
                    <?php if($exibir['qnt_estoque'] > 0) {?> <!--Verificando se a quantidade do produto em estoque é maior que zero-->

                         <!--já que a sessão ID está setada e a quantidade em estoque é maior que zero então ao clicar no botão adicionar ao carrinho redirecione o usuario para a pagina de carrinho-->
                        <a href="carrinho.php?id=<?php echo $exibir['id_produto'];?>" style="text-decoration:none;">
                            <button type="button" class="btn btn-success btn-block">Adicionar ao Carrinho</button>
                        </a>
                    <?php } else { ?>
                        <!--A seesão ID está setada mais a quantidade em estoque é igual a zero, então substitua o botão adicionar ao carrinho pelo botão Produto Indisponivel.-->
                        <a href="" style="text-decoration:none;">
                            <button type="button" class="btn btn-danger btn-block" disabled >Produto indisponivel</button>
                        </a>
                    <?php } ?>
                <?php } ?>

                </div><!--Manter Botões-->

            </div><!--col-sm-4-->
        <?php } ?>

        </div><!--Row-->
</div><!--container-->





<?php
    // incluindo o rodapé.
    include 'footer.php';

?>