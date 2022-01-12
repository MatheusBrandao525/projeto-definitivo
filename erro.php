<?php
    session_start();
    include 'cabecalho.html';
    include 'conexao.php';
    include 'menu.php';
    include 'slider.php';

?>

<div class="text-center">
    <h3>Usuario ou senha incorretos!</h3>
    <div>
        <a href="login.php">
            <button type="submit" class="btn btn-sm btn-default" style="border:0.5px solid; width:250px; font-size:18px; margin:20px 0;">
                            
                            <span class="glyphicon glyphicon-pencil"> Tentar novamente</span>
                            
            </button>
        </a>
    </div>
    <div style="padding-bottom:10px;">
        <a href="cadastro_cliente.php" style="font-size:20px; text-decoration: none;">Ainda não sou cadastrado</a>
    </div>
</div>

<?php
    include 'footer.php';
?>