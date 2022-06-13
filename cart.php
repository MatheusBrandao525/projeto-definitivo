<?php

    session_start();

    include 'conexao.php';
    include 'menu.php';

    if(empty($_SESSION['ID'])){
        // Se o usuario não estiver logado então redirecione-o para a pagina de login...
        header('location:login.php');
    }




    $codigoProd = $_GET['id'];
    $codigoUser = $_GET['idUser'];


    $consulta = $cn->query("select * from tbl_produto where id_produto = '$codigoProd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

    // Variaveis que recebem os valores a serem inseridos no banco de dados..
    $nomeProd = $_POST['nomeProd']; // Recebe o nome do produto...
    $preco = $_POST['precoProd']; // Recebe o valor do produto...
    $nomeImg = $_POST['nomeImg'];

    // Fazendo tratamento do formato do valor do produto antes de enviar para o baco...
    $rermoveponto = '.';  // Criando variável e atribuindo o valor de ponto para ela...
    $preco = str_replace($rermoveponto, '', $preco); // Removendo ponto de casa decimal,substituindo por vazio...
    $removevirgula = ','; // Criando uma variável e atribuido o valor de virgula para ela...
    $preco = str_replace($removevirgula, '.', $preco); // Removendo a virgula da casa decimal e substituindo por ponto...


    try { // Try para tentar inserir os valores no banco de dados...

        $inserirCart = $cn->query("
        INSERT INTO tbl_carrinho(codigo_produto, codigo_usuario, nome_produto, img_produto, vlr_produto) 
        VALUES ('$codigoProd','$codigoUser','$nomeProd','$nomeImg','$preco')");

        echo 'produto inserido no carrinho';

     header('location:index.php');

    }catch(PDOException $e) { // Se não exploda um erro na tela...
        echo $e->getMessage();
    }
