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

    <section class="container-fuid cadastrarProduto">
        <div class="center">
            <div class="tituloForm">
                <h3 class="bordaInferior">Cadastrar Produtos</h3>
            </div><!--tituloForm-->

            <div class="formulario_produto w100">
                <form action="validaForm.php" class="w100" method="post" enctype="multipart/form-data">
                    <div class="row w100 frmCadastroProd">
                        <div class="col-sm-3">
                            <div class="form-group">

                                <label class="label" for="">Nome do Produto</label>
                                <input class="form-control" type="text" class="input" required name="nomeproduto">
                            </div><!--Formulario-->

                            <div class="form-group">

                                <label class="label" for="">Peso</label>
                                <input class="form-control" type="text" class="input" required name="peso">
                            </div><!--Formulario-->

                            <div class="form-group">

                                <label class="label" for="">Largura</label>
                                <input class="form-control" type="text" class="input" required name="largura">
                            </div><!--Formulario-->

                            <div class="form-group">

                                <label class="label" for="">Altura</label>
                                <input class="form-control" type="text" class="input" required name="altura">
                            </div><!--Formulario-->
                        </div><!-- col-sm-03 -->

                        <div class="col-sm-3">

                            <div class="form-group">

                                <label class="label" for="">Categoria do Produto</label>
                                <select class="form-control" name="sltcat">
                                    <option value="">Selecione</option>
                                    <?php while($listaCat = $consultaCat-> fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $listaCat['id_categoria']; ?>"><?php echo $listaCat['nome_categoria']; ?></option>
                                    <?php } ?>
                                </select>
                            </div><!--Formulario-->

                            <label for="">Selecione três imagens para o produto</label>

                            <div class="form-group">

                                <label class="label" for="">Imagem 01</label>
                                <input type="file" class="slcImagem" accept="image/*" required name="txtcapa">
                            </div><!--Formulario-->

                            <div class="form-group">

                                <label class="label" for="">Imagem 02</label>
                                <input type="file" class="slcImagem" accept="image/*" required name="txtcapa">
                            </div><!--Formulario-->

                            <div class="form-group">

                                <label class="label" for="">Imagem 03</label>
                                <input type="file" class="slcImagem" accept="image/*" required name="txtcapa">
                            </div><!--Formulario-->
                        </div><!-- col-sm-03 -->
                        <div class="col-sm-3">

                            <div class="form-group">

                                <label class="label" for="">Descrição do Produto</label>
                                <textarea class="form-control" type="text" cols="30" rows="11" class="input" required name="descricaoproduto"></textarea>
                            </div><!--Formulario-->
                        </div><!-- col-sm-03 -->


                        <div class="col-sm-3">

                            <div class="estoqueEvalor">
                                <div class="form-group">

                                    <label class="label" for="">Estoque</label>
                                    <input class="form-control quantidadeEmEstoque" type="number" min="1" class="number" required name="qntestoque">
                                </div><!--Formulario-->

                                <div class="form-group">

                                    <label class="label" for="">Valor Unt.</label>
                                    <input class="form-control preco vlrUnitario" type="text" min="1" class="number" id="preco" required name="valorproduto">
                                </div><!--Formulario-->
                            </div><!-- estoqueEvalor -->

                            <div class="btns">

                                <div>
                                    <a href="validaForm.php">
                                        <button type="submit" class="btn btn-lg btn-success btn-block" name="cadastrar">Cadastrar</button>
                                    </a>
                                </div>
                                <div class="btnVoltar">
                                    <a href="admin.php" class="btn btn-lg btn-danger btn-block">Voltar</a>
                                </div><!--btnVoltar-->
                            </div><!--btns-->
                            <div class="erros">

                            </div>
                        </div><!-- col-sm-03 -->
                    </div><!-- Row -->
                </form>

            </div>
        </div><!--center-->
    </section>
</main>


<?php 

include 'footer.php';

?>