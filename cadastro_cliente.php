
<?php
session_start();
	// Incluindo arquivos importantes...
	include 'conexao.php';	
	include 'menu.php';
	include 'slider.php';
	
?>

	
	<div class="container-fluid">
	
		<div class="row" style="justify-content: center;">
		
			<div style=" width: 450px;" class="maisUmaDiv">
				
				<h2>Cadastro de novo Cliente</h2>
				
				<form method="post" action="inserirusuario.php" name="logon">
				
					<div class="form-group">
					
						<label for="nome">Nome</label>
						<!--Input que recebe o valor do campo Nome-->
						<input name="txtnome" type="text" class="form-control" required id="nome" placeholder="Insira seu nome...">
					</div><!--Form-group-->
					
					<div class="form-group">
					
							<label for="sobrenome">Sobrenome</label>
							<!--Input que recebe o valor do campo Sobrenome-->
							<input name="txtsobrenome" type="text" class="form-control" required id="sobrenome" placeholder="Insira seu sobrenome...">
					</div><!--Form-group-->
						
						
					<div class="form-group">
					
							<label for="email">E-mail</label>
							<!--Input que recebe o valor do campo E-mail-->
							<input name="txtemail" type="email" class="form-control" required id="email" placeholder="exemplo@gmail.com">
					</div><!--Form-group-->
						
					
					<div class="form-group">
					
							<label for="senha">Senha</label>
							<!--Input que recebe o valor do Campo Senha-->
							<input name="txtsenha" type="password" class="form-control" required id="senha" placeholder="Crie uma Senha...">
					</div><!--Form-group-->
						
					<div class="form-group">
					
							<label for="endereco">Endereço</label>
							<!--Input que recebe o valor do campo Endereço-->
							<textarea name="txtendereco" rows="5" class="form-control" required id="endereco" placeholder="Seu endereço..."></textarea>
					</div><!--Form-group-->
						
						
					<div class="form-group">
					
							<label for="cidade">Cidade</label>
							<!--Input que recebe o valor do campo Cidade-->
							<input name="txtcidade" type="text" class="form-control" required id="cidade" placeholder="Sua cidade...">
					</div><!--Form-group-->
						
						
					<div class="form-group">
					
							<label for="cep">CEP</label>
							<!--Input que recebe o valor do campo Cep-->
							<input name="txtcep" type="text" class="form-control cep" required id="cep" placeholder="00000-000">
					</div><!--Form-group-->
					
					<!--Se todos os campos estiverem prenchidos o botao cadastrar envia os dados para a pagina de validação que redicionara o usuario para a pagina de login-->		
					<button type="submit" style="background-color:#009694;" class="btn btn-block">Cadastrar</button>

					<!--Caso o usuario tenha entrado por engano ou queira voltar para pagina de login-->
					<a href="index.php" style="text-decoration:none;"> <button type="button" style="background-color:#E0775A; margin-top:10px;" class="btn btn-block">Voltar</button></a>
					
				</form><!--Form-->
							
			</div><!--MaisUmaDiv-->
		</div><!--Row-->
	</div><!--Container-Fluide-->
	
	<script>
	
	// Usando mascara de CEP para o campo CEP...
	$(document).ready(function(){
		$("#cep").mask("00000-000");
	});
		
		
	</script>
	
	<?php
		// Incluindo arquivo de Rodapé... 
		include 'footer.php' 
	?>