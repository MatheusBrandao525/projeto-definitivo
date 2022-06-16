<?php

    session_start();

    include 'conexao.php';

    if(empty($_SESSION['ID'])){
        // Se o usuario não estiver logado então redirecione-o para a pagina de login...
        header('location:login.php');
    }



    
    $codigoProd = $_GET['id'];
    $codigoUser = $_SESSION['ID'];
    $quantidade = 1;

    $consulta = $cn->query("select codigo_produto from tbl_carrinho where codigo_produto = '$codigoProd' and codigo_usuario = '$codigoUser'");


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

        if($consulta->rowCount()== 0){
        $inserirCart = $cn->query("
        INSERT INTO tbl_carrinho(codigo_produto, codigo_usuario, nome_produto,quantidade_produto, img_produto, vlr_produto) 
        VALUES ('$codigoProd','$codigoUser','$nomeProd','$quantidade','$nomeImg','$preco')");

        header('location:index.php');
        exit();
        }else{
            $atualizaQuantidade = $cn->query("
                update tbl_carrinho set quantidade_produto = quantidade_produto + '$quantidade' where codigo_produto = '$codigoProd' and codigo_usuario ='$codigoUser'
            ");
            header('location:index.php');
            exit();

        }

/*     echo '<script>window.location.href.index.php</script>'; */

    }catch(PDOException $e) { // Se não exploda um erro na tela...
        echo $e->getMessage();
    }
