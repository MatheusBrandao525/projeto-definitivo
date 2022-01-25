<?php 

include 'conexao.php';

$nome = $_POST['txtnome'];
$sobrenome = $_POST['txtsobrenome'];
$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];
$endereco = $_POST['txtendereco'];
$cidade = $_POST['txtcidade'];
$nocep = $_POST['txtcep'];


$consulta = $cn->query("select ds_email from tbl_usuario where ds_email = '$email'");
$exibe = $consulta ->fetch(PDO::FETCH_ASSOC);

if($consulta->rowCount() == 1) {
    header('location:erro1.php');
} else{
    $incluir = $cn->query("
    insert into tbl_usuario(nome_usuario,sobrenome,ds_email,ds_senha,ds_status,ds_endereco,ds_cidade,no_cep)
    values('$nome','$sobrenome','$email','$senha','0','$endereco','$cidade','$nocep')");
    header('location:ok.php');

}
?>