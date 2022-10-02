<?php 

    session_start();

    require "../admin/conexao.php"; // incluindo arquivo de conexão.

    $id_carrinho = $_GET['idCart'];
    $data = date('Y-m-d');
    $ticket = uniqid();
    $id_usuario = $_SESSION['ID'];

    $consultaCarrinho = $cn->query("SELECT * FROM tbl_carrinho WHERE codigo_usuario = '$id_usuario'");
    $exibeDadosCart = $consultaCarrinho->fetchall(PDO::FETCH_ASSOC);
    $mostraDadosCart = $cn->query("SELECT * FROM tbl_carrinho WHERE codigo_usuario = '$id_usuario'");

    foreach($exibeDadosCart as $dadosCart){
        $mostraCart = $mostraDadosCart->fetch(PDO::FETCH_ASSOC);
        $consulta = $cn->query("SELECT vl_produto, nome_produto FROM tbl_produto WHERE id_produto = '{$dadosCart['codigo_produto']}'");
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
        $nomeProd = $exibe['nome_produto'];
        $preco = $exibe['vl_produto'];
        $id = $mostraCart['codigo_produto'];
        $qnt = $mostraCart['quantidade_produto'];

        $inserir = $cn->query("INSERT INTO tbl_venda (no_ticket, id_usuario, id_produto, qnt_produto, vlr_produto, dt_venda) 
        VALUES ('$ticket','$id_usuario','$id','$qnt','$preco','$data')");
    } 

    require '../app/fim.php';