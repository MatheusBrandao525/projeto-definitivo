<?php

    session_start(); // Iniciando Sessão...

    include 'conexao.php';

    $id_produto = $_GET['id']; // Variavel recebe o id do produto via metodo GET e cria uma sessão carrinho para ele...
    $id_usuario = $_GET['idUser'];
    $excluiCart = $cn->query("DELETE FROM tbl_carrinho WHERE codigo_produto = '$id_produto' AND codigo_usuario ='$id_usuario'"); // removendo o id da sessão carrinho, assimm removendo o produto do carrinho...


    header('location:carrinho.php'); // Redirecionando o usuario para o carrinho de compras novamente...

?>