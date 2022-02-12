<?php
    session_start();
    include 'cabecalho.html';
    include 'conexao.php';
    include 'menu.php';
    include 'menu_2.php';

?>

<div class="text-center" style="padding-top:50px; height:50vh;">
    <span style="font-size:50px;"><i class="far fa-question-circle"></i></span>

    <h3>Nenhum produto foi encontrado!</h3>

</div>

<?php
    include 'footer.php';
?>