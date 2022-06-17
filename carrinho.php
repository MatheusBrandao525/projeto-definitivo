<?php

    session_start(); // Iniciando a Sessão...
    // Usando a session ID para verificar se o usuario está logado...
    if(empty($_SESSION['ID'])){
        // Se o usuario não estiver logado então redirecione-o para a pagina de login...
        header('location:login.php');
    }

    include 'conexao.php';
    include 'menu.php';

    $id_user = $_SESSION['ID'];
	

    $consultaCart = $cn->query("SELECT * FROM tbl_carrinho where codigo_usuario = '$id_user'");


?> 

<main class="alturaCarrinhoDeCompras">

<div class="container-fluid containnerCart">
	
	<div class="row text-center tituloCart" style="margin-top: 15px;">
		<h1>Carrinho de Compras</h1>
	</div>
	
    <?php

    $total = 0; // variavel total que recebe valor nulo

    // criando um loop para sessão carrinho recebe o $cd e a quantidade
    while($exibeCart = $consultaCart->fetch(PDO::FETCH_ASSOC)) {

    ?>

	<div class="row dadosCarrinho" style="margin-top: 15px;">
			
		<div class="col-sm-1 col-sm-offset-1">
			<img src="imgem/<?php echo $exibeCart['img_produto']; ?>" class="img-responsiva">
		</div>
		
		
		<div class="col-sm-4 margin">
			<h4 style="padding-top:20px"><?php echo $exibeCart['nome_produto']; ?></h4>
		</div>	
		
		
		<div class="col-sm-2 precoCart">
			<h4 style="padding-top:20px">R$ <?php echo $exibeCart['vlr_produto']; ?></h4>
		</div>		

		<div class="col-sm-2 quantidadeCart">
			<a href="less.php?id=<?php echo $exibeCart['codigo_produto']; ?>&idUser=<?php echo $id_user; ?>">
				<button id="diminuircart" type="button" class="btn btn-dark diminuiCart">-</button>
			</a>
			<h4 class="qntcart" id="#qntcart"><?php echo $exibeCart['quantidade_produto']; ?> </h4>
			<a href="plus.php?id=<?php echo $exibeCart['codigo_produto']; ?>&idUser=<?php echo $id_user; ?>">
				<button id="aumentarcart" type="button" class="btn btn-dark aumentaCart">+</button>
			</a>
		</div>

		<div class="col-sm-1 col-xs-offset-right-1 botaoremover">
		
		<!--remove o item do carrinho pelo id -->
		<a href="removeCarrinho.php?id=<?php echo $exibeCart['codigo_produto'];?>" class="btn btn-lg btn-block btn-danger ajuste">X</a>
		</div> 
		
	</div>	
	<?php } ?>
	</div>
</div>
	




	<!-- exibindo o valor da variavel total da compra -->
	<div class="row tituloCart" style="margin-top: 15px;">
		<h1>Total: R$ <?php echo number_format($total,2,',','.'); ?> </h1>
	</div>
	
    <div class="botoesCart">
        <div class="acaoCart">
                <a href="index.php" class="btn btn-primary" style="margin:8px;">Continuar comprando</a>

                <?php /* if(){  */?>
                    <a href="finalizarCompra.php" class="btn btn-success">Finalizar compra</a>
                <?php /* }  */?>
        </div>
    </div>
</main>

<?php 

include 'footer.php'

?>