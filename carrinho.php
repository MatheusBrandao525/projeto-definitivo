<?php

    session_start(); // Iniciando a Sessão...
    // Usando a session ID para verificar se o usuario está logado...
    if(empty($_SESSION['ID'])){
        // Se o usuario não estiver logado então redirecione-o para a pagina de login...
        header('location:login.php');
    }

    include 'conexao.php';
    include 'menu.php';

    // Verificando se o id do produto está setado...
    if(!empty($_GET['id'])){
        // Se estiver setado então a variavel $id_produto recebe o ID...
        $id_produto = $_GET['id'];
    

        // Se a sessão carrinho não estiver preenchida(setada)...
        if(!isset($_SESSION['carrinho'])){
            // Então será criada uma sessão carrinho para receber um vetor...
            $_SESSION['carrinho'] = array();
        }

        // Se a variavel $id_produto não estiver setada(preenchida)...
        if(!isset($_SESSION['carrinho'] [$id_produto])) {

            // Será adicionado um produto ao carrinho...
            $_SESSION['carrinho'] [$id_produto] = 1;
        }else {
            // Caso contrario, se ela estiver setada, adicione novos produtos...
            $_SESSION['carrinho'] [$id_produto] += 1;
        }

        // Incluindo arquivo 'mostraCarrinho.php'...
        include 'mostraCarrinho.php';

    }else {
        // Mostrando o carrinho vazinho
        include 'mostraCarrinho.php';
    }

?> 

<main class="alturaCarrinhoDeCompras">
	<!-- exibindo o valor da variavel total da compra -->
	<div class="row tituloCart" style="margin-top: 15px;">
		<h1>Total: R$ <?php echo number_format($total,2,',','.'); ?> </h1>
	</div>
	
	
    <div class="botoesCart">
        <div class="acaoCart">
                <a href="index.php" class="btn btn-primary" style="margin:8px;">Continuar comprando</a>

                <?php if(count($_SESSION['carrinho'])>0){ ?>
                    <a href="finalizarCompra.php" class="btn btn-success">Finalizar compra</a>
                <?php } ?>
        </div>
    </div>
</main>

<?php 

include 'footer.php'

?>