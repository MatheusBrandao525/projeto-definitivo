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
        $nomeUser = $_GET['nomeUser'];
        $id_user = $_GET['id_user'];
        $nome_produto = $_GET['nomeProduto'];
        $valor_Prod = $_GET['valorprod'];

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

        $quantidadeCart = count($_SESSION['carrinho']);


    }else {
        // Mostrando o carrinho vazinho
        include 'mostraCarrinho.php';
    }

?> 

<main class="alturaCarrinhoDeCompras">

<div class="container-fluid containnerCart">
	
	<div class="row text-center tituloCart" style="margin-top: 15px;">
		<h1>Carrinho de Compras</h1>
	</div>
	
    <?php

  /*   include 'cabecalho.html'; */

    $total = 0; // variavel total que recebe valor nulo

    // criando um loop para sessão carrinho recebe o $cd e a quantidade
    foreach($_SESSION['carrinho'] as $id => $quantidade)  {

    $consulta = $cn->query("SELECT * FROM tbl_produto WHERE id_produto ='$id'");

    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

	$qnt_estoque = $exibe['qnt_estoque'];
    $produto = $exibe['nome_produto'];  // variável que recebe o produto
    $preco = number_format(($exibe['vl_produto']),2,',','.'); // variável que recebe o preço
    $total += $exibe['vl_produto'] * $quantidade; // variável que recebe preço * quantidade




    ?>

	<div class="row dadosCarrinho" style="margin-top: 15px;">
			
		<div class="col-sm-1 col-sm-offset-1">
			<img src="imgem/<?php echo $exibe['imagen_produto']; ?>" class="img-responsiva">
		</div>
		
		
		<div class="col-sm-4 margin">
			<h4 style="padding-top:20px"><?php echo $produto; ?></h4>
		</div>	
		
		
		<div class="col-sm-2 precoCart">
			<h4 style="padding-top:20px">R$ <?php echo $preco; ?></h4>
		</div>		

		<div class="col-sm-2 quantidadeCart">
			<a href="less.php?id=<?php echo $exibe['id_produto'];?>">
				<button href="less.php?id=<?php echo $exibe['id_produto'];?>" id="diminuircart" type="button" class="btn btn-dark diminuiCart">-</button>
			</a>
			    <h4 class="qntcart" id="#qntcart"><?php echo $quantidade; ?> </h4>
			<?php if($quantidade < $qnt_estoque) { ?>
			<a href="plus.php?id=<?php echo $exibe['id_produto']; ?>">
				<button id="aumentarcart" data-id="<?php echo $exibe['id_produto'];?>" type="button" class="btn btn-dark aumentaCart">+</button>
			</a>
			<?php }else{ ?>
				<button href="#" class="btn btn-dark">+</button>
			<?php } ?>
		</div>

		<div class="col-sm-1 col-xs-offset-right-1 botaoremover">
		
		<!--remove o item do carrinho pelo id -->
		<a href="removeCarrinho.php?id=<?php echo $id;?>" class="btn btn-lg btn-block btn-danger ajuste">X</a>
		</div> 
		
	</div>	
	</div>
</div>
	
	<?php } ?>




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