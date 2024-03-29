<?php

    session_start();

    require "../admin/conexao.php";

    if(empty($_SESSION['ID'])){
        // Se o usuario não estiver logado então redirecione-o para a pagina de login...
        header('location:login.php');
    }



    
    $codigoProd = $_GET['id']; // recebendo o código do produto...
    $codigoUser = $_SESSION['ID']; // recebendo o ID do usuario...
    $quantidade = 1;

    $consulta = $cn->query("SELECT codigo_produto FROM tbl_carrinho WHERE codigo_produto = '$codigoProd' AND codigo_usuario = '$codigoUser'");


    // Variaveis que recebem os valores a serem inseridos no banco de dados..
    $preco = $_POST['precoProd']; // Recebe o valor do produto...

    // Fazendo tratamento do formato do valor do produto antes de enviar para o baco...
    $rermoveponto = '.';  // Criando variável e atribuindo o valor de ponto para ela...
    $preco = str_replace($rermoveponto, '', $preco); // Removendo ponto de casa decimal,substituindo por vazio...
    $removevirgula = ','; // Criando uma variável e atribuido o valor de virgula para ela...
    $preco = str_replace($removevirgula, '.', $preco); // Removendo a virgula da casa decimal e substituindo por ponto...


    try { // Try para tentar inserir os valores no banco de dados...

        if($consulta->rowCount()== 0){
        $inserirCart = $cn->query("INSERT INTO tbl_carrinho(codigo_produto, codigo_usuario,quantidade_produto, vlr_produto) 
        VALUES ('$codigoProd','$codigoUser','$quantidade','$preco')");
        
        header('location:../public/index.php#produtos'); 
        exit();
        }else{
            $atualizaQuantidade = $cn->query("
                update tbl_carrinho set quantidade_produto = quantidade_produto + '$quantidade' where codigo_produto = '$codigoProd' and codigo_usuario ='$codigoUser'
            ");
            header('location:../public/index.php');
            exit();

        }

    }catch(PDOException $e) { // Se não exploda um erro na tela...
        echo $e->getMessage();
    }
