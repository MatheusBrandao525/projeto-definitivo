<?php

require '../app/menu.php';



?>

<div class="text-center erroLogin">
    <div>
        <h3>Compra efetuada com sucesso!</h3>
        <h4>Seu numero de registro é: <?php echo $ticket;?> </h4>
        <div>
             <a href="../public/index.php">
                <button class="btn btn-sm btn-info" style="border:0.5px solid; width:250px; font-size:18px; margin:20px 0;">
                                
                                <span class="glyphicon glyphicon-pencil">Continuar comprando</span>
                                
                </button>
            </a> 
        </div>
    </div>
</div>