<?php
    session_start();
    include 'cabecalho.html';
    include 'conexao.php';
    include 'menu.php';

    $consulta= $cn->query('select nome_usuario, ds_email, ds_status, ds_endereco from  tbl_usuario');
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);

?>
<div class="row align-items-center" style="justify-content: center; text-align:center; margin: 10px 0;">
    <div class="imagem_perfil" style="border-radius: 55%; background-color:darkslategray; width:200px; height:200px;">

    </div><!--imagem_perfil-->

</div><!--center-->
<div class="nome text-center">
    <div class="organizado"> 
        <h4><?php echo $exibe['nome_usuario'] ;?></h4>
        <h4><?php echo $exibe['ds_email'] ;?></h4>
        <h4><?php echo $exibe['ds_endereco'] ;?></h4>
<?php
    if($_SESSION['Status']==0) {
            $consulta= $cn->query('select nome_usuario, ds_email, ds_status, ds_endereco from  tbl_usuario');
            $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    ?>
        <h4>
            <a href="index.php">
            <button class="btn btn-sm btn-danger">voltar</button>
            </a>
        </h4>
    <?php }else{ ?>
        <h4>

            <a href="admin.php">
            <button class="btn btn-sm btn-danger">Administrador</button>
            </a>

        </h4>
        <div style="padding-bottom:25px;">
            <a href="index.php">
                <button class="btn btn-sm btn-danger">voltar</button>
            </a>
        </div>
<?php } ?>


    </div>

</div>








<?php
    include 'footer.php';

?>