<?php
    session_start();
    require "../admin/conexao.php"; // incluindo arquivo de conexão.
    require '../app/menu.php';
    require '../app/menu-principal.php';

?>

<div class="text-center erroLogin">
    <div>
        <h3>Usuario ou senha incorretos!</h3>
        <div>
            <a href="../app/login.php">
                <button type="submit" class="btn btn-sm btn-default" style="border:0.5px solid; width:250px; font-size:18px; margin:20px 0;">
                                
                                <span class="glyphicon glyphicon-pencil"> Tentar novamente</span>
                                
                </button>
            </a>
        </div>
        <div style="padding-bottom:10px;">
            <a href="../app/cadastro_cliente.php" style="font-size:20px; text-decoration: none;">Ainda não sou cadastrado</a>
        </div>
    </div>
</div>

<?php
    require '../app/footer.php';
?>