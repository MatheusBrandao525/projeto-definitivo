<?php
	
	session_start(); 
	if(empty($_SESSION['ID'])){
		
		header('location:login.php');
		
	}

	
	include 'conexao.php';
	//include 'nav.php';
	
	$consulta = $cn->query("SELECT * FROM tbl_produto WHERE id_produto = '$id_produto' ");
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

	$qnt_estoque = $exibe['qnt_estoque'];


	// verificando se o codigo do produto NÃO está vazio
	if (!empty($_GET['id'])) {
	
	// inserindo o código do produto na variável $id_produto
	
	$id_produto=$_GET['id'];
	// se a sessão carrinho não estiver preenchida
	if (!isset($_SESSION['carrinho'])) {
		  // será criado uma sessão chamado carrinho para receber um vetor
		  $_SESSION['carrinho'] = array();
	}
	
	// se a variavel $id_produto não estiver setado(preenchida)
	if (!isset($_SESSION['carrinho'][$id_produto])) {
		
		//  adicionado um produto ao carrinho
		$_SESSION['carrinho'][$id_produto]=1;
	}else {
		// se setada adiciona novos produtos
		  $_SESSION['carrinho'][$id_produto]+=1;
          header('location:carrinho.php');

	}

		// incluindo o arquivo 'mostraCarrinho.php'
		header('location:carrinho.php');
		
	} else {
		
		//mostrando o carrinho	vazio	
		header('location:carrinho.php');
		
		
	}	





?>