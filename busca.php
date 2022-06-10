<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--
	<!-- Latest compiled and minified CSS --
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library --
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript --
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
	
	
</head>

<body>	
	
	<?php
	
	include 'conexao.php';
	include 'menu.php';
	include	'menu_2.php';
	include 'menu-principal.php';
	
	if(empty($_GET['txtBuscar'])) {
		echo "<html><script>location.href='index.php'</script></html>";
	}

    $pesquisa = $_GET['txtBuscar'];
    $consulta = $cn->query("select * from tbl_produto where nome_produto like concat('%','$pesquisa','%') or descricao like concat ('%','$pesquisa','%')");

	if( $consulta->rowCount() ==0 ) {
		echo "<html><script>location.href='erro2.php'</script></html>";
	}
	
	?>
	
<div class="container-fluid">
	
	
	<?php while(  $exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
	<div class="row exibebusca" style="margin-top: 15px; padding:0 5%;">
		
		<div class="col-sm-1 col-sm-offset-1 imgBuscar"><img src="imgem/<?php echo $exibe['imagen_produto']; ?>" class="img-responsiva"></div>
		<div class="col-sm-5 nomeBusca"><h4 style="padding-top:40px; padding-left:2%; margin-left:25px;"><?php echo $exibe['nome_produto'];?></h4></div>
		<div class="col-sm-2 precoBusca"><h4 style="padding-top:40px"> R$ <?php echo number_format($exibe['vl_produto'],2,',','.'); ?></h4></div>

       
		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:40px">
        <a href="detalhes.php?id=<?php echo $exibe['id_produto'];?>" style=" text-decoration:none;">
        <button class="btn btn-sm btn-block btn-info">		
		<span class="glyphicon glyphicon-info-sign" style="color: white;"> Detalhes</span>
		</button>
        </a>	
		</div> 
	
				
	</div>		
	<?php } ?>

	
</div>
	
</body>
<?php
	
	include 'footer.php';
	
	?>
</html>