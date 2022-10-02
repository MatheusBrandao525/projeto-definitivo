<?php 

    session_start(); // Iniciando a Sessão...
    // Usando a session ID para verificar se o usuario está logado...
    if(empty($_SESSION['ID'])){
        // Se o usuario não estiver logado então redirecione-o para a pagina de login...
        header('location:../app/login.php');
    }


    require "../admin/conexao.php"; // incluindo arquivo de conexão.

    $data = date('Y-m-d');
    $ticket = uniqid();
    $id_usuario = $_SESSION['ID'];

    $verificaCart = $cn->query("SELECT * FROM tbl_carrinho WHERE codigo_usuario = '$id_usuario'");
    $verifica = $verificaCart->fetch(PDO::FETCH_ASSOC);

    foreach($verifica as $id =>$qnt){
        $consulta = $cn->query("SELECT vl_produto, nome_produto FROM tbl_produto WHERE id_produto = '$id'");
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
        $nomeProd = $exibe['nome_produto'];
        $preco = $exibe['vl_produto'];

        $inserir = $cn->query("INSERT INTO tbl_venda (no_ticket, id_usuario, id_produto, nome_produto, qnt_produto, vlr_produto, dt_venda) VALUES ('$ticket','$id_usuario','$id','$nomeProd','$qnt','$preco','$data')");
    } 

    require '../app/fim.php';