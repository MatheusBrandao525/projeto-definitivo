<?php

    session_start(); // Iniciando a Sessão...
    // Usando a session ID para verificar se o usuario está logado...
    if(empty($_SESSION['ID'])){
        // Se o usuario não estiver logado então redirecione-o para a pagina de login...
        header('location:../app/login.php');
    }


require '../app/menu.php';



?>

<div class="text-center erroLogin">
    <div>
        <h3>Compra efetuada com sucesso!</h3>
        <h4>O numero do seu pedido é: <a href="../admin/areaUser.php"><?php echo $ticket;?></a> </h4>
        <div>
             <a href="../public/index.php">
                <button class="btn btn-sm btn-info" style="border:0.5px solid; width:250px; font-size:18px; margin:20px 0;">
                                
                                <span class="glyphicon glyphicon-pencil">Continuar comprando</span>
                                
                </button>
            </a> 
        </div>
    </div>
</div>