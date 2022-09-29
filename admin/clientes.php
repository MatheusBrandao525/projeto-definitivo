<?php

session_start();

if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
    header('location:index.php');
}

require '../app/menu.php';

$consultaUser = $cn->query("select * from tbl_usuario WHERE id_usuario = 1");

?>

<div class="container-fluid paginaClientes">
    <div class="centro">
        <a href="../admin/admin.php">
            <button class="btn btn-danger">Voltar</button>
        </a>
    </div>
    <div class="alinarNaMesmaLinha">
        <div class="formularioPesquisa pesquisar">
            
            <form action="../app/buscaAltera.php" class="form-inline formularioPqs" method="get">
                <input type="search" id="inputpesquisar" class="form-control mr-sm-2 search" name="txtBuscarAlt" placeholder="Buscar cliente para alterar">
                <button class="btn btn-success botaoProcurar" type="submit">Buscar</button>
            </form>
        </div>
        </div>
        
    </div><!--barra_de_pesquisa-->
    <div class="limpa"></div>



	<?php while( $exibeUser = $consultaUser->fetch(PDO::FETCH_ASSOC)) { ?>
	<div class="row exibeBuscaCliente" style="">
		
		<div class="col-sm-1 col-sm-offset-1 imgBuscar"><img src="../public/assets/imgem/<?php /* echo $exibeUser['imagen_produto']; */ ?>" class="img-responsiva"></div>
		<div class="col-sm-3 nomeCliente">
            <h4><?php echo $exibeUser['nome_usuario'];?></h4>
        </div>
		<div class="col-sm-4 emailCliente">
            <h4><?php echo $exibeUser['ds_email']; ?></h4>
        </div>

       
		<div class="col-sm-2 col-xs-offset-right-1 disflex botoesCliente">
            <a href="../admin/alterarProdutos.php?id=<?php echo $exibeUser['id_usuario'];?>">
                <button class="btn btn-sm btn-block btn-info">		
		            <span class="glyphicon glyphicon-info-sign"> Alterar</span>
		        </button>
            </a>	
            <a href="../admin/excluiProdutos.php?id=<?php echo $exibeUser['id_usuario'];?>">
                <button class="btn btn-sm btn-block btn-danger">		
                    <span class="glyphicon glyphicon-info-sign"> Excluir</span>
                </button>
            </a>

		</div> 
	
				
	</div>		
	<?php } ?>
    