<?php

    session_start(); // Iniciando a Sessão...
    // Usando a session ID para verificar se o usuario está logado...
    if(empty($_SESSION['ID'])){
        // Se o usuario não estiver logado então redirecione-o para a pagina de login...
        header('location:../app/login.php');
    }

    require '../app/menu.php';

    $id_user = $_SESSION['ID'];
	

    $consultaCart = $cn->query("SELECT * FROM tbl_carrinho where codigo_usuario = '$id_user'");

?> 

<h2 class="text-center">Carrinho de compras</h2>
<main class="row alturaCarrinhoDeCompras">
	<div class="col-sm-8 espacamentoLateralCarrnho">
	<div class="w100">
		<h3 class="text-center">Produtos</h3>
	<?php
	$total = 0;

		// criando um loop para sessão carrinho recebe o $cd e a quantidade
		while($exibeCart = $consultaCart->fetch(PDO::FETCH_ASSOC)) {
		$codigoProduto = $exibeCart['codigo_produto'];
		$dadosProduto = $cn->query("SELECT nome_produto, imagen_produto, qnt_estoque, vl_produto FROM tbl_produto WHERE id_produto = '$codigoProduto'");
		$exibeDadosProduto = $dadosProduto->fetch(PDO::FETCH_ASSOC);

		$quantidadeEmEstoque = $exibeDadosProduto['qnt_estoque'];
		$quantidadeNoCarrinho = $exibeCart['quantidade_produto'];	
	?>
		<div class="row exibeProdutosCarrinho">
				<div class="col-sm-2 display-flex">
					<img src="../public/assets/imgem/<?php echo $exibeDadosProduto['imagen_produto']; ?>" class="img-responsiva">
				</div>
				<div class="col-sm-3 display-flex">
					<h5><?php echo $exibeDadosProduto['nome_produto']; ?></h5>
				</div>
				<div class="col-sm-2 display-flex">
					<h5>R$ <?php echo number_format($exibeDadosProduto['vl_produto'],2,',','.'); ?></h5>
				</div>
				<div class="col-sm-2 display-flex">
					<a href="../app/less.php?id=<?php echo $exibeCart['codigo_produto']; ?>&idUser=<?php echo $id_user; ?>">
						<button id="diminuircart" type="button" class="btn btn-dark diminuiCart">-</button>
					</a>
						<h4 class="qntcart" id="#qntcart"><?php echo $exibeCart['quantidade_produto']; ?> </h4>
					<?php if($quantidadeNoCarrinho < $quantidadeEmEstoque) { ?>
					<a href="../app/plus.php?id=<?php echo $exibeCart['codigo_produto']; ?>&idUser=<?php echo $id_user; ?>">
						<button id="aumentarcart" type="button" class="btn btn-dark aumentaCart">+</button>
					</a>
					<?php }else{ ?>
						<a href="#">
						<button id="aumentarcart" type="button"disabled class="btn btn-dark aumentaCart">+</button>
					</a>
					<?php } ?>
				</div>
				<div class="col-sm-2 display-flex	">
					<a href="../app/removeCarrinho.php?id=<?php echo $exibeCart['codigo_produto'];?>&idUser=<?php echo $id_user;?>" class="btn btn-lg btn-block btn-danger ajuste">Remover</a>
				</div>

		</div>
	
		<?php
	
			$total += $exibeDadosProduto['vl_produto'] * $exibeCart['quantidade_produto'];

		}
	 	?>
	</div>
	</div>

	<div class="col-sm-4 espacorigth">

	<?php

		$frete = 50;

		$valorFinal = $total + $frete;

	?>
		<h3 class="text-center">Informações do carrinho</h3>
		<div class="infoCarrinho">
			<p>Produtos: R$ <?php echo number_format($total,2,',','.'); ?></p>
			<p>Frete: R$ <?php echo number_format($frete,2,',','.'); ?></p>
			<p>Total: R$ <?php echo number_format($valorFinal,2,',','.'); ?></p>
			<div class="botoesCart">
				<div class="acaoCart">
					<a href="../public/index.php#produtos" class="btn btn-primary" style="margin:8px;">Continuar comprando</a>

					<?php /* if(){  */?>
						<a href="../app/finalizarCompra.php" class="btn btn-success">Finalizar compra</a>
					<?php /* }  */?>
				</div>
			</div>
		</div>
	</div>	

</main>

<?php 

	require '../app/footer.php';

?>