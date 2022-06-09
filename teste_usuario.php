<?php
    session_start(); // Iniciando sessão...

    // Incluido arquivo de conexão com o banco de dados...
    include 'conexao.php';

    // Variaveis que recebem os valores inseridos no formulario de login...
    $Vemail = $_POST['txtemail']; // Variavel que recebe o email do usuario/cliente...
    $Vsenha = $_POST['txtsenha']; // Variavel que recebe a senha inserida pelo usuario/cliente...

    // Criando a variavel que recebe os do banco de dados para fazer a validção...
    $consulta = $cn->query("
    select id_usuario, nome_usuario, sobrenome, ds_email, ds_senha, ds_status, ds_endereco, ds_cidade, no_cep from tbl_usuario where ds_email = '$Vemail' and ds_senha = '$Vsenha'
    ");

    // verificando de o usuario/cliente ja existe no banco de dados...
    if($consulta->rowCount() == 1){
        $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);
        // Verificando se o usuario é ADM ou apenas um usuario normal...
        if($exibeUsuario['ds_status']==0 ){ 
            $_SESSION['ID'] = $exibeUsuario['id_usuario'];
            $_SESSION['Status']= $exibeUsuario['ds_status'];
            header('location:index.php');
        } else{
            $_SESSION['ID'] = $exibeUsuario['id_usuario'];
            $_SESSION['Status'] = $exibeUsuario['ds_status'] == 1;
            header('location:index.php');
        }
    }else{
        // Caso o usuario não exista no banco de dados redirecione-o para a pagina erro.php...
        header('location:erro.php');
    }

?>