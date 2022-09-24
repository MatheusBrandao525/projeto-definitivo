<?php 
    session_start();
    require '../app/menu.php';
    require '../app/menu-usuario.php';

 $consulta= $cn->query('SELECT nome_usuario,sobrenome, ds_email,ds_senha, ds_status, ds_endereco ,ds_cidade,no_cep FROM  tbl_usuario');
 $exibeDadosUser = $consulta->fetch(PDO::FETCH_ASSOC);

?>
<body>
<div class="dadosUser">
    <h3 class="text-center">Seus dados</h3>

    <div class="dados text-center">
        <div>
            <span><b>Nome:</b> <?php echo $exibeDadosUser['nome_usuario'];?></span>
        </div>
        <div>
            <span><b>Sobrenome:</b> <?php echo $exibeDadosUser['sobrenome'];?></span>
        </div>
        <div>
            <span><b>Email:</b> <?php echo $exibeDadosUser['ds_email'];?></span>
        </div>
        <div>
            <span><b>Endereço:</b> <?php echo $exibeDadosUser['ds_endereco'];?></span>
        </div>
        <div>
            <span><b>Cidade:</b> <?php echo $exibeDadosUser['ds_cidade'];?></span>
        </div>
        <div>
            <span><b>CEP:</b> <?php echo $exibeDadosUser['no_cep'];?></span>
        </div>
        <div>
            <span><b>Telefone:</b> (00)00000-0000</span>
        </div>
    </div>

    <div class="botaoAlteraDadosUser">
        <a href="#">
            <button class="btn btn-lg btn-info" onclick="showModal()">Alterar dados</button>
        </a>
    </div>

</div>

<div class="modal" id="modal">
    <div style=" width: 620px;" class="maisUmaDiv">
				
				<h2 class="text-center">Altere seus dados</h2>
				
				<form method="post" action="../admin/alteraDadosUsuario.php" name="logon">

                <div class="separaFormModal">
					<div class="form-group">
					
						<label for="nome">Nome</label>
						<!--Input que recebe o valor do campo Nome-->
						<input name="txtnome" type="text" value="<?php echo $exibeDadosUser['nome_usuario'];?>" class="form-control" required id="nome" placeholder="Insira seu nome...">
					</div><!--Form-group-->
					
					<div class="form-group">
					
							<label for="sobrenome">Sobrenome</label>
							<!--Input que recebe o valor do campo Sobrenome-->
							<input name="txtsobrenome" type="text" value="<?php echo $exibeDadosUser['sobrenome'];?>" class="form-control" required id="sobrenome" placeholder="Insira seu sobrenome...">
					</div><!--Form-group-->
						
						
					<div class="form-group">
					
							<label for="email">E-mail</label>
							<!--Input que recebe o valor do campo E-mail-->
							<input name="txtemail" type="email" value="<?php echo $exibeDadosUser['ds_email'];?>" class="form-control" required id="email" placeholder="exemplo@gmail.com">
					</div><!--Form-group-->
						
                </div>

                <div class="separaFormModal">
					
					<div class="form-group">
					
							<label for="senha">Senha</label>
							<!--Input que recebe o valor do Campo Senha-->
							<input name="txtsenha" type="password" value="<?php echo $exibeDadosUser['ds_senha'];?>" class="form-control" required id="senha" placeholder="Crie uma Senha...">
					</div><!--Form-group-->

                    <div class="form-group">
					
                        <label for="telefone">Telefone</label>
                        <!--Input que recebe o valor do campo Cep-->
                        <input name="txttelefone" type="text" value="" class="form-control cep" required id="telefone" placeholder="(00) 00000-00">
                    </div><!--Form-group-->
						
						
					<div class="form-group">
					
							<label for="cidade">Cidade</label>
							<!--Input que recebe o valor do campo Cidade-->
							<input name="txtcidade" type="text" value="<?php echo $exibeDadosUser['ds_cidade'];?>" class="form-control" required id="cidade" placeholder="Sua cidade...">
					</div><!--Form-group-->
                </div>		
						
                <div class="separaFormModal">
					<div class="form-group">
					
							<label for="cep">CEP</label>
							<!--Input que recebe o valor do campo Cep-->
							<input name="txtcep" type="text" value="<?php echo $exibeDadosUser['no_cep'];?>" class="form-control cep" required id="cep" placeholder="00000-000">
					</div><!--Form-group-->
                </div>

                <div class="separaFormModal">
                    <div class="form-group">

                        <label for="endereco">Endereço</label>
                        <!--Input que recebe o valor do campo Endereço-->
                        <textarea name="txtendereco" rows="5" class="form-control" required id="endereco" placeholder="Seu endereço..."><?php echo $exibeDadosUser['ds_endereco'];?></textarea>
                    </div><!--Form-group-->
                </div>
					<!--Se todos os campos estiverem prenchidos o botao cadastrar envia os dados para a pagina de validação que redicionara o usuario para a pagina de login-->		
					<button type="submit" style="background-color:#009694;" class="btn btn-block">Salvar dados</button>

					<!--Caso o usuario tenha entrado por engano ou queira voltar para pagina de login-->
					<a href="#" style="text-decoration:none;"> <button type="button" style="background-color:#E0775A; margin-top:10px;" class="btn btn-block" onclick="hideModal()">Voltar</button></a>
					
				</form><!--Form-->
							
			</div><!--MaisUmaDiv-->
</div>


</body>

<?php

require '../app/footer.php';

?>