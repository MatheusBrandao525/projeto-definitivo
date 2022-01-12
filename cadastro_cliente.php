<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="jquery.mask.js"></script>

    <title>Minha Loja</title>
	
<script>
	
$(document).ready(function(){
    $("#cep").mask("00000-000");
});
	
	
</script>
	
</head>
	
	
	


<body>
	
<?php
	
	include 'conexao.php';	
	include 'menu.php';
	include 'slider.php';
	
?>

	
	<div class="container-fluid">
	
		<div class="row" style="justify-content: center;">
		
			<div style=" width: 450px;">
				
				<h2>Cadastro de novo Cliente</h2>
				
				<form method="post" action="inserirusuario.php" name="logon">
				
					<div class="form-group">
				
						<label for="nome">Nome</label>
						<input name="txtnome" type="text" class="form-control" required id="nome">
					</div>
				
				<div class="form-group">
				
						<label for="sobrenome">Sobrenome</label>
						<input name="txtsobrenome" type="text" class="form-control" required id="sobrenome">
				</div>
					
					
				<div class="form-group">
				
						<label for="email">E-mail</label>
						<input name="txtemail" type="email" class="form-control" required id="email">
				</div>
					
				
				<div class="form-group">
				
						<label for="senha">Senha</label>
						<input name="txtsenha" type="password" class="form-control" required id="senha">
				</div>
					
				<div class="form-group">
				
						<label for="endereco">Endereço</label>
						<textarea name="txtendereco" rows="5" class="form-control" required id="endereco"></textarea>
				</div>
					
					
				<div class="form-group">
				
						<label for="cidade">Cidade</label>
						<input name="txtcidade" type="text" class="form-control" required id="cidade">
				</div>
					
					
				<div class="form-group">
				
						<label for="cep">CEP</label>
						<input name="txtcep" type="text" class="form-control" required id="cep">
				</div>
				
							
				<button type="submit" style="background-color:#009694;" class="btn btn-block">Cadastrar</button>

				<a href="index.php" style="text-decoration:none;"> <button type="button" style="background-color:#E0775A; margin-top:10px;" class="btn btn-block">Voltar</button></a>
				
				</form>
							
			</div>
		</div>
	</div>
	
	<?php include 'footer.php' ?>
	
	
	
	
</body>
</html>