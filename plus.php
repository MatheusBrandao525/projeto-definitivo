<?php
	
	session_start(); 
	if(empty($_SESSION['ID'])){
		
		header('location:login.php');
		
	}

	
	include 'conexao.php';


	// verificando se o codigo do produto NÃO está vazio

	
	// inserindo o código do produto na variável $id_produto

	$codigoUsuario = $_GET['idUser'];
	$codigoProduto = $_GET['id'];

	$consultaEstoque = $cn->query("SELECT qnt_estoque FROM tbl_produto WHERE id_produto = '$codigoProduto'");
	$exibeEstoque = $consultaEstoque->fetch(PDO::FETCH_ASSOC);

	$consultaQuantidade = $cn->query("SELECT * FROM tbl_carrinho WHERE codigo_produto = '$codigoProduto' AND codigo_usuario = '$codigoUsuario'");
	$exibeQuantidadeCart = $consultaQuantidade->fetch(PDO::FETCH_ASSOC);

	$quantidadeEmEstoque = $exibeEstoque['qnt_estoque'];
	$quantidadeNocarrinho = $exibeQuantidadeCart['quantidade_produto'];

	if($consultaQuantidade->rowCount()>0){
 			if($quantidadeNocarrinho >=1 && $quantidadeNocarrinho < $quantidadeEmEstoque){
				$diminui = $cn->query("UPDATE tbl_carrinho SET quantidade_produto = quantidade_produto +1 WHERE codigo_usuario = '$codigoUsuario' AND codigo_produto = '$codigoProduto';");
				header('location:carrinho.php');
				exit();
			}elseif($quantidadeNocarrinho == $quantidadeEmEstoque){
				echo 'impossivel adicionar mais produtos!';
			}
		} 



?>