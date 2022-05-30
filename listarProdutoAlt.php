<?php

session_start();

if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
    header('location:index.php');
}


include 'conexao.php';
include 'menu.php';

$consulta = $cn->query('select * from tbl_produto');

?>

<div class="container-fluid " style=" height: 100%; padding-bottom:5px;">
    <div class="centro">
        <a href="admin.php">
            <button class="btn btn-danger">Voltar</button>
        </a>
    </div>
    <div class="alinarNaMesmaLinha">
        <div class="formularioPesquisa pesquisar">
            
            <form action="buscaAltera.php" class="form-inline formularioPqs" method="get">
                <input type="search" id="inputpesquisar" class="form-control mr-sm-2 search" name="txtBuscarAlt" placeholder="Buscar produto para alterar">
                <button class="btn btn-success botaoProcurar" type="submit">Buscar</button>
            </form>
        </div>
        </div>
        
    </div><!--barra_de_pesquisa-->
    <div class="limpa"></div>



	<?php while(  $exibeAlt = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
	<div class="row exibebusca" style="margin-top: 15px; padding:0 5%;">
		
		<div class="col-sm-1 col-sm-offset-1 imgBuscar"><img src="imgem/<?php echo $exibeAlt['imagen_produto']; ?>" class="img-responsiva"></div>
		<div class="col-sm-5 nomeBusca"><h4 style="padding-top:40px; padding-left:2%; margin-left:25px;"><?php echo $exibeAlt['nome_produto'];?></h4></div>
		<div class="col-sm-2 precoBusca"><h4 style="padding-top:40px"> R$ <?php echo number_format($exibeAlt['vl_produto'],2,',','.'); ?></h4></div>

       
		<div class="col-sm-2 col-xs-offset-right-1 disflex" style="padding-top:40px">
        <a href="alterarProdutos.php?id=<?php echo $exibeAlt['id_produto'];?>&id2=<?php echo $exibeAlt['id_categoria'];?>" style=" text-decoration:none;">
        <button class="btn btn-sm btn-block btn-info">		
		<span class="glyphicon glyphicon-info-sign" style="color: white;"> Alterar</span>
		</button>
        </a>	
        <a href="excluiProdutos.php?id=<?php echo $exibeAlt['id_produto'];?>" style=" text-decoration:none;">
        <button class="btn btn-sm btn-block btn-danger">		
		<span class="glyphicon glyphicon-info-sign" style="color: white;"> Excluir</span>
		</button>
        </a>

		</div> 
	
				
	</div>		
	<?php } ?>
    