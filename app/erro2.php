<?php
    session_start();
    require "../admin/conexao.php"; // incluindo arquivo de conexão.
    require '../app/menu.php';
    require '../app/menu_2.php';

?>

<div class="text-center" style="padding-top:50px; height:50vh;">
    <span style="font-size:50px;"><i class="far fa-question-circle"></i></span>

    <h3>Nenhum produto foi encontrado!</h3>

</div>

<?php
    require '../app/footer.php';
?>