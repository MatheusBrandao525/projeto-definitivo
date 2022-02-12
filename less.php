<?php
	
	session_start(); 
	if(empty($_SESSION['ID'])){
		
		header('location:login.php');
		
	}

	
	include 'conexao.php';
	//include 'nav.php';
	
	// verificando se o codigo do produto NÃO está vazio
	if(!empty($_GET['id'])) {
		
		// inserindo o código do produto na variável $cd_prod
		$id_produto=$_GET['id'];
		$quantidade_cart=$_GET['quantidade'];
		// se a sessão carrinho não estiver preenchida
		if (!isset($_SESSION['carrinho'])) {
			// será criado uma sessão chamado carrinho para receber um vetor
			$_SESSION['carrinho'] = array();
		}

		if($_SESSION['carrinho'] [$id_produto] <2) {
			
			unset($_SESSION['carrinho'][$id_produto]);

		}else {
			$_SESSION['carrinho'][$id_produto]-=1;
			header('location:carrinho.php');
		}

		header('location:carrinho.php');
	} else {
		header('location:carrinho.php');

		
		
		
	}	





?>