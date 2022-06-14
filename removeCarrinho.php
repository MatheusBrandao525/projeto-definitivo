<?php

    session_start(); // Iniciando Sessão...

    include 'conexao.php';

    $id_produto = $_GET['id']; // Variavel recebe o id do produto via metodo GET e cria uma sessão carrinho para ele...

    $excluiCart = $cn->query("DELETE FROM tbl_carrinho WHERE codigo_produto = '$id_produto'"); // removendo o id da sessão carrinho, assimm removendo o produto do carrinho...


    header('location:carrinho.php'); // Redirecionando o usuario para o carrinho de compras novamente...

?>