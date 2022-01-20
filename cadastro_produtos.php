<!--

Completo => Criar um form-group para cadastro de produtos e linkar com o botão cadastrar produtos da pagina Adm...

Em Andamento => Fazer a validação do formulario de cadastro de produtos para que o usuario preencha os campos devidamente...
-->
<?php 

session_start();
if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
    header('location:index.php');
}

include 'cabecalho.html';
include 'conexao.php';

?>

<main>

    <section class="container cadastrarProduto">
        <div class="center">
            <div class="tituloForm">
                <h3 class="bordaInferior">Cadastrar Produtos</h3>
            </div><!--tituloForm-->

            <div class="formulario_produto">
                <form action="">
                    <div class="form-group">

                        <label class="label" for="">Nome do Produto</label>
                        <input type="text" class="input" required >
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Descrição do Produto</label>
                        <input type="text" class="input" required >
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Categoria do Produto</label>
                        <input type="text" list="ListaGategorias" required >
                        <datalist id="ListaGategorias">
                            <option value="Masculino"></option>
                            <option value="Feminino"></option>
                            <option value="Infantil"></option>
                            <option value="Relojoaria"></option>
                            <option value="Joalheria"></option>
                        </datalist>
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Imagem do Produto</label>
                        <input type="file" required >
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Quantidade em Estoque</label>
                        <input type="number" min="1" class="number" required >
                    </div><!--Formulario-->

                    <div class="form-group">

                        <label class="label" for="">Valor do Produto</label>
                        <input type="number" min="1" class="number" required >
                    </div><!--Formulario-->

                    <div class="btns">
                        <div class="btnCadastrar">
                            <a href="inserirProduto.php" class="btn btn-lg btn-success">Cadastrar Produto</a>
                        </div><!--btnCadastrar-->

                        <div class="btnVoltar">
                            <a href="admin.php" class="btn btn-lg btn-danger">Voltar</a>
                        </div><!--btnVoltar-->
                    </div><!--btns-->
                </form>

            </div>
        </div><!--center-->
    </section>
</main>


<?php 

include 'footer.php';

?>