<?php
	session_start();

	require '../app/menu.php';
	require '../app/menu_2.php';
	require '../app/menu-principal.php';


	
	if(empty($_GET['txtBuscar'])) {
		echo "<html><script>location.href='../public/index.php'</script></html>";
	}

    $pesquisa = $_GET['txtBuscar'];
    $consulta = $cn->query("select * from tbl_produto where nome_produto like concat('%','$pesquisa','%') or descricao like concat ('%','$pesquisa','%')");

	if( $consulta->rowCount() ==0 ) {
		echo "<html><script>location.href='../app/erro2.php'</script></html>";
	}
	
	?>
	
<div class="container-fluid">
	
	
	<?php while(  $exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
	<div class="row exibebusca" style="margin-top: 15px; padding:0 5%;">
		
		<div class="col-sm-1 col-sm-offset-1 imgBuscar">
			<img src="../public/assets/imgem/<?php echo $exibe['imagen_produto']; ?>" class="img-responsiva">
		</div>
		<div class="col-sm-5 nomeBusca">
			<h4 style="padding-top:40px; padding-left:2%; margin-left:25px;"><?php echo $exibe['nome_produto'];?></h4>
		</div>
		<div class="col-sm-2 precoBusca">
			<h4 style="padding-top:40px"> R$ <?php echo number_format($exibe['vl_produto'],2,',','.'); ?></h4>
		</div>

       
		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:40px">
			<a href="../app/detalhes.php?id=<?php echo $exibe['id_produto'];?>" style=" text-decoration:none;">
				<button class="btn btn-sm btn-block btn-info">		
					<span class="glyphicon glyphicon-info-sign" style="color: white;"> Detalhes</span>
				</button>
			</a>	
		</div> 
	
				
	</div>		
	<?php } ?>

	
</div>
	
<?php
	
	require '../app/footer.php';
	
?>