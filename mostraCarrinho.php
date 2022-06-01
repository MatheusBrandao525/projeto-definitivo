<?php

        if(!isset($_SESSION['carrinho'])){
            // Então será criada uma sessão carrinho para receber um vetor...
            $_SESSION['carrinho'] = array();
        }


?>

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
