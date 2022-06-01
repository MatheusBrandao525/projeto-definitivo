<?php 

include 'conexao.php';

if(empty($_SESSION['ID'])){
    // Se o usuario não estiver logado então redirecione-o para a pagina de login...
    header('location:login.php');
}


if($_SESSION['Status']==1) {
    $consulta= $cn->query('select nome_usuario, ds_email, ds_status, ds_endereco from  tbl_usuario');
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
?>

<div class="navConta ">

    <nav class="navcenter">

        <ul>
            <li><a href="index.php"><div class="botaovoltarUser"><button class="btn btn-lg btn-danger">Voltar</button></div></a></li>
            <li><a href="admin.php"><strong>Painel administrativo</strong></a></li>
            <li><a href="dadosUser.php"><strong>meus dados</strong></a></li>
            <li><a href="areaUser.php"><strong>minhas compras</strong></a></li>
            <li><a href=""><strong>lista de desejos</strong></a></li>
            <li><a href=""><strong>suporte</strong></a></li>
        </ul>
    </nav>
</div>
    <?php }else{ ?>

<div class="container-fluid">
    <nav>
        <ul>
            <li><a href="index.php"><div class="botaovoltarUser"><button class="btn btn-lg btn-danger">Voltar</button></div></a></li>
            <li><a href=""><strong>meus dados</strong></a></li>
            <li><a href=""><strong>minhas compras</strong></a></li>
            <li><a href=""><strong>lista de desejos</strong></a></li>
            <li><a href=""><strong>suporte</strong></a></li>
        </ul>
    </nav>
</div>

<?php } ?>