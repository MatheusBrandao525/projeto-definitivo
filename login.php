<?php
    include 'cabecalho.html';
    include 'conexao.php';
    include 'menu.php';
?>



<div class="container-fluid" style="height: 100%; padding-bottom:15px;">
<div class="container" >
    <div class="row align-items-center" style="justify-content: center;">
    <div class="" style="width:450px;">
        <form method="post" action="teste_usuario.php" style="padding-top: 15px;">
            <h4 class="text-center">Login de usuário</h4>
            <label for="email">E-mail</label>
            <div class="form-group">
                <input class="form-control" type="email" require name="txtemail" placeholder="Digite seu e-mail...">
            </div>    

            <label for="senha">Senha</label>
            <div class="form-group">
                <input class="form-control" type="password" require name="txtsenha" placeholder="Digite sua senha...">
            </div> 
                <button type="submit" class="btn btn-sm btn-default" style="border:0.5px solid; width:85px;">
					
					<span class="glyphicon glyphicon-pencil"> Entrar</span>
					
				</button>
                <a href="cadastro_cliente.php" style="text-decoration: none;">Ainda não sou cadastrado</a>

        </form>
    </div>
    </div>  
</div>  

</div>





<?php
    include 'footer.php';
?>