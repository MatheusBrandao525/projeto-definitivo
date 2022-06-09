<?php 

    session_start();

    include 'conexao.php';

    $data = date('Y-m-d');
    $ticket = uniqid();
    $id_usuario = $_SESSION['ID'];

    foreach($_SESSION['carrinho'] as $id =>$qnt){
        $consulta = $cn->query("SELECT vl_produto FROM tbl_produto WHERE id_produto = '$id'");
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
        $preco = $exibe['vl_produto'];

        $inserir = $cn->query("INSERT INTO tbl_venda (no_ticket, id_usuario, id_produto, qnt_produto, vlr_produto, dt_venda) VALUES ('$ticket','$id_usuario','$id','$qnt','$preco','$data')");
    } 

    include 'fim.php';