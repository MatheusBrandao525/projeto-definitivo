<?php 

session_start();
if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
    header('location:index.php');
}

require '../app/menu.php';

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

<section class="container alterarProduto">
        <div class="center">
            <div class="tituloForm">
                <h3 class="bordaInferior">Alterar produto</h3>
            </div><!--tituloForm-->

            <div class="formulario_altera_produto w100">
                <form action="../test/iserirProdutoAtualizado.php?id_altera=<?php echo $id_prod;?>" method="post" enctype="multipart/form-data" class="w100">
                <div class="row w100 frmAlteraProd">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="label" for="">Nome do Produto</label>
                            <input class="form-control" type="text" class="input" value="<?php echo $exibeProd['nome_produto'];?>" required name="nomeproduto">
                        </div><!--Formulario-->

                        <div class="form-group">
                            <label class="label" for="">Peso</label>
                            <input class="form-control" type="text" class="input" value="<?php echo $exibeProd['peso'];?>"  required name="peso">
                        </div><!--Formulario-->

                        <div class="form-group">
                            <label class="label" for="">Largura</label>
                            <input class="form-control" type="text" class="input" value="<?php echo $exibeProd['largura'];?>"  required name="largura">
                        </div><!--Formulario-->

                        <div class="form-group">
                            <label class="label" for="">Altura</label>
                            <input class="form-control" type="text" class="input" value="<?php echo $exibeProd['altura'];?>"  required name="altura">
                        </div><!--Formulario-->
                    </div><!-- col-sm-03 -->

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="label" for="">Categoria do produto</label>
                            <select class="form-control" name="sltcat">
                                <option value="<?php echo $categoriaPro['id_categoria'];?>"><?php echo $categoriaPro['nome_categoria'];?></option>
                                <?php while($listaCat = $consultaCat-> fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $listaCat['id_categoria']; ?>"><?php echo $listaCat['nome_categoria']; ?></option>
                                <?php } ?>
                            </select>
                        </div><!--Formulario-->

                        <div class="form-group">

                            <label class="label" for="">Imagem 01</label>
                                <div class="imagemAltera">
                                    <img src="../public/assets/imgem/<?php echo $exibeProd['imagen_produto'];?>" alt="">
                                </div>
                            <input type="file" class="slcImagem" accept="../public/assets/image/*" name="txtcapa">
                        </div><!--Formulario-->

                        <div class="form-group">

                        <label class="label" for="">Imagem 02</label>
                            <div class="imagemAltera">
                                <img src="../public/assets/imgem/<?php echo $exibeProd['imagen_produto'];?>" alt="">
                            </div>
                        <input type="file" class="slcImagem" accept="../public/assets/image/*" name="txtcapa">
                        </div><!--Formulario-->

                    </div><!-- col-sm-03 -->


                    <div class="col-sm-3">


                        <div class="form-group">

                            <label class="label" for="">Imagem 03</label>
                                <div class="imagemAltera">
                                    <img src="../public/assets/imgem/<?php echo $exibeProd['imagen_produto'];?>" alt="">
                                </div>
                            <input type="file" class="slcImagem" accept="../public/assets/image/*" name="txtcapa">
                        </div><!--Formulario-->

                        <div class="form-group">
                            <label class="label" for="">Descrição do Produto</label>
                            <textarea class="form-control" type="text" cols="30" rows="7"  class="input" value="<?php echo $exibeProd['descricao'];?>" required name="descricaoproduto"></textarea>
                        </div><!--Formulario-->
                    </div><!-- col-sm-03 -->
                    
                    <div class="col-sm-3">
                        <div class="estoqueEvalor">
                            <div class="form-group">

                                <label class="label" for="">Estoque</label>
                                <input class="form-control quantidadeEmEstoque" type="number" min="1" class="number" value="<?php echo $exibeProd['qnt_estoque'];?>" required name="qntestoque">
                            </div><!--Formulario-->

                            <div class="form-group">

                                <label class="label" for="">Vlr. Unitario</label>
                                <input class="form-control preco vlrUnitario" type="text" min="1" value="<?php echo number_format($exibeProd['vl_produto'],2,',','.');?>" class="number" id="preco" required name="valorproduto">
                            </div><!--Formulario-->
                    </div><!-- estoqueEvalor -->

                    <div class="btns">

                        <a href="iserirProdutoAtualizado.php">
                            <button type="submit" class="btn btn-lg btn-success" name="cadastrar">Salvar</button>
                        </a>
                        <div class="btnVoltar">
                            <a href="../admin/admin.php" class="btn btn-lg btn-danger">Voltar</a>
                        </div><!--btnVoltar-->
                    </div><!--btns-->
                    <div class="erros">

                    </div>
                    </div><!-- col-sm-03 -->
                </form>

            </div>
        </div><!--center-->
    </section>
</main>


<?php 

require '../app/footer.php';

?>