<?php
	
	session_start();

    // Verificando se o usuario tem permissão para acessar esta pagina...
    if(empty($_SESSION['ID'])){
        // Se o usuario não estiver logado então redirecione-o para a pagina de login...
        header('location:login.php');
    }
	
	require '../app/menu.php';

	$id_usuario = $_SESSION['ID'];

	$consultaVenda = $cn->query("SELECT * FROM tbl_venda WHERE id_usuario= '$id_usuario'");
	
	
?>
	
<div class="container alturaAreaUser">
	<div class="topAreaUser">
			<a href="../app/config_conta.php">
				<button class="btn btn-lg btn-danger">Voltar</button>
			</a>
	</div>


		<h2 class="text-center">Minhas compras</h2>

<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-2 col-sm-offset-1"><h4>Data</h4></div>
		<div class="col-sm-2"><h4> Ticket </h4></div>
		<div class="col-sm-4"> <h4>Produto </h4></div>
		<div class="col-sm-2"> <h4>Quantidade </h4></div>
		<div class="col-sm-2"> <h4>Preço </h4></div>
				
	</div>	
	
	<?php while($exibeVenda = $consultaVenda->fetch(PDO::FETCH_ASSOC)){ ?>
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-2 col-sm-offset-1"> <?php echo date('d/m/Y', strtotime($exibeVenda['dt_venda']));?> </div>
		<div class="col-sm-2"> <?php echo $exibeVenda['no_ticket'];?> </div>
		<div class="col-sm-4"> <?php echo $exibeVenda['nome_produto'];?> </div>
		<div class="col-sm-2 text-center"> <?php echo $exibeVenda['qnt_produto'];?> </div>
		<div class="col-sm-2"> <?php echo number_format($exibeVenda['vlr_total_produto'],2,',','.');?> </div>
				
	</div>		
	<?php } ?>
	
</div>
	
<?php
	
	require '../app/footer.php';
	
?>