
<?php 

session_start();
if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
    header('location:index.php');
}

include 'cabecalho.html';
include 'conexao.php';

    $id_prod = $_GET['id'];
    $id_categoria = $_GET['id2'];

$consultaProduto = $cn->query("select *from tbl_produto where id_produto = '$id_prod'");

$mostraCategoria = $cn->query("select * from tbl_categoria where id_categoria = '$id_categoria'");
$consultaCat = $cn->query("select * from tbl_categoria");
$categoriaPro = $mostraCategoria->fetch(PDO::FETCH_ASSOC);
$exibeProd = $consultaProduto->fetch(PDO::FETCH_ASSOC);


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
                <h3 class="bordaInferior">Alterar produto</h3>
            </div><!--tituloForm-->

            <div class="formulario_produto">
                <form action="iserirProdutoAtualizado.php?id_altera=<?php echo $id_prod;?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">

                        <label class="label" for="">Nome do Produto</label>
                        <input class="form-control" type="text" class="input" value="<?php echo $exibeProd['nome_produto'];?>" required name="nomeproduto">
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Descrição do Produto</label>
                        <input class="form-control" type="text" class="input" value="<?php echo $exibeProd['descricao'];?>" required name="descricaoproduto">
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Categoria do Produto</label>
                        <select class="form-control" name="sltcat">
                            <option value="<?php echo $categoriaPro['id_categoria'];?>"><?php echo $categoriaPro['nome_categoria'];?></option>
                            <?php while($listaCat = $consultaCat-> fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $listaCat['id_categoria']; ?>"><?php echo $listaCat['nome_categoria']; ?></option>
                            <?php } ?>
                        </select>
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Imagem do Produto</label>
                        <div class="imagemAltera">
                        <img src="imgem/<?php echo $exibeProd['imagen_produto'];?>" style="max-width:150px;" alt="">
                        </div>
                        <input type="file" accept="image/*" name="txtcapa">
                    </div><!--Formulario-->

                    <div class="form-group">

                    <label class="label" for="">Imagem do Produto</label>
                    <div class="imagemAltera">
                    <img src="imgem/0fbf41786a70e8b5ab7114db4c783237.jpg" style="max-width:150px;" alt="">
                    </div>
                    <input type="file" accept="image/*" name="txtcapa">
                    </div><!--Formulario-->

                    <div class="form-group">

                    <label class="label" for="">Imagem do Produto</label>
                    <div class="imagemAltera">
                    <img src="imgem/0fbf41786a70e8b5ab7114db4c783237.jpg" style="max-width:150px;" alt="">
                    </div>
                    <input type="file" accept="image/*" name="txtcapa">
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Quantidade em Estoque</label>
                        <input class="form-control" type="number" min="1" class="number" value="<?php echo $exibeProd['qnt_estoque'];?>" required name="qntestoque">
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Valor do Produto</label>
                        <input class="form-control preco" type="text" min="1" value="<?php echo number_format($exibeProd['vl_produto'],2,',','.');?>" class="number" id="preco" required name="valorproduto">
                    </div><!--Formulario-->

                    <div class="btns">

                    <a href="iserirProdutoAtualizado.php">
                        <button type="submit" class="btn btn-lg btn-success" name="cadastrar">Salvar</button>
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