<?php
session_start();
include 'conexao.php';

$Vemail = $_POST['txtemail'];
$Vsenha = $_POST['txtsenha'];

//echo $Vemail.'<br>';
//echo $Vsenha.'<br>';


$consulta = $cn->query("select id_usuario, nome_usuario, sobrenome, ds_email, ds_senha, ds_status, ds_endereco, ds_cidade, no_cep from tbl_usuario where ds_email = '$Vemail' and ds_senha = '$Vsenha'");

if($consulta->rowCount() == 1){
    $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);
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
    header('location:erro.php');
}

?>