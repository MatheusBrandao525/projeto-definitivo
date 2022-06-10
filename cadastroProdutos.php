<?php 
session_start();

if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
    header('location:index.php');
}

include 'conexao.php';
include 'menu.php';


$consultaCat = $cn->query("select * from tbl_categoria");




?>


<main>
<script>
	
	
	
    $(document).ready(function(){
        
    $('.preco').mask('000.000.000.000.000,00', {reverse: true});
        
    });
        
</script>

    <section class="container cadastrarProduto">
        <div class="center">
            <div class="tituloForm">
                <h3 class="bordaInferior">Cadastrar Produtos</h3>
            </div><!--tituloForm-->

            <div class="formulario_produto">
                <form action="validaForm.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">

                        <label class="label" for="">Nome do Produto</label>
                        <input class="form-control" type="text" class="input" required name="nomeproduto">
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Descrição do Produto</label>
                        <input class="form-control" type="text" class="input" required name="descricaoproduto">
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Categoria do Produto</label>
                        <select class="form-control" name="sltcat">
                            <option value="">Selecione</option>
                            <?php while($listaCat = $consultaCat-> fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $listaCat['id_categoria']; ?>"><?php echo $listaCat['nome_categoria']; ?></option>
                            <?php } ?>
                        </select>
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Imagem do Produto</label>
                        <input type="file" accept="image/*" required name="txtcapa">
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Quantidade em Estoque</label>
                        <input class="form-control" type="number" min="1" class="number" required name="qntestoque">
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Valor do Produto</label>
                        <input class="form-control preco" type="text" min="1" class="number" id="preco" required name="valorproduto">
                    </div><!--Formulario-->

                    <div class="btns">

                    <a href="validaForm.php">
                        <button type="submit" class="btn btn-lg btn-success" name="cadastrar">Cadastrar</button>
                    </a>
                        <div class="btnVoltar">
                            <a href="admin.php" class="btn btn-lg btn-danger">Voltar</a>
                        </div><!--btnVoltar-->
                    </div><!--btns-->
                    <div class="erros">

                    </div>
                </form>

            </div>
        </div><!--center-->
    </section>
</main>


<?php 

include 'footer.php';

?>