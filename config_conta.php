<?php
    session_start();
    include 'conexao.php';
    include 'menu.php';

    $consulta= $cn->query('select nome_usuario, ds_email, ds_status, ds_endereco from  tbl_usuario');
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);

?>
<body>
    

<div class="conteiner-fluid">
    <?php include_once ('menu-usuario.php'); ?>
</div>

</body>







<?php
    include 'footer.php';

?>