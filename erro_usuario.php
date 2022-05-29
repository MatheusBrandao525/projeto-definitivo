<?php 

    include 'cabecalho.html';
    include 'menu.php';
    include 'menu-principal.php';
?>


<div class="text-center erroUsuario">
    <div>
        <h3 class="tituloErro">Usuario ja cadastrado!</h3>
        <div>
            <a href="login.php">
                <button type="submit" class="btn btn-sm btn-default" style="border:0.5px solid; width:250px; font-size:18px; margin:20px 0;">
                                
                                <span class="glyphicon glyphicon-pencil"> Fazer login</span>
                                
                </button>
            </a>
        </div>
    </div>
</div>



<?php 

    include 'footer.php';

?>