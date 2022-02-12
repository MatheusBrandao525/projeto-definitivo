<?php
    session_start();
    
    // Verificando se o usuario tem permissão para acessar esta pagina...
    if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
        header('location:index.php');
    }

    // Incluindo arquivos importantes...
    include 'cabecalho.html';
    include 'conexao.php';

    //Criar um menu que exibe "Bem vindo [Nome do ADM]!"
    $consulta = $cn->query('select * from tbl_usuario');
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
?>
<body>
    

<main>
    <section class="container adm">
        <div class="olaadm">
            <span class="nomeAdm">Olá seja bem vindo <?php echo $exibe['nome_usuario']; ?>!</span>
        </div>
        <div class="painelDeControle">
            <a href="cadastroProdutos.php"><!--Criar um formulario para casdastrar produtos-->
                <button class="btn btn-lg btn-primary botoesAdm">Cadastrar Produtos <i class="fas fa-plus"></i></button>
            </a>
            <a href="alterarProdutos.php"><!--Criar um formulario para alterar produtos-->
                <button class="btn btn-lg btn-info botoesAdm">Alterar Produtos <i class="fas fa-edit"></i></button>
            </a>
            <a href="excluiProdutos.php"><!--Criar uma pagina para buscar e excluir produtos-->
                <button class="btn btn-lg btn-danger botoesAdm">Excluir Produtos <i class="fas fa-times"></i></button>
            </a>
            <a href="indiceVendas.php"><!--Criar uma pagina que mostre todas as vendas realizadas-->
                <button class="btn btn-lg btn-success botoesAdm">Vendas <i class="fas fa-chart-line"></i></button>
            </a>
            <a href="mostraClientes.php"><!--Criar uma pagina para buscar e editar clientes-->
                <button class="btn btn-lg btn-secondary botoesAdm">Clientes <i class="fas fa-address-book"> </i></button>
            </a>
            <a href="suporte.php"><!--Criar uma pagina que ofereça suporte ao usuario e que ensine-o a usar a plataforma e suas ferramentas-->
                <button class="btn btn-lg btn-dark botoesAdm">Supote <i class="fas fa-question"></i></button>
            </a>
            <a href="config_conta.php"><!--Ao clicar no botao a pagina retorna para a pagina configurção de conta-->
                <button class="btn btn-lg btn-warning botoesAdm">Voltar <i class="fas fa-undo-alt"></i></button>
            </a>
        </div><!--Painel de controle-->
    </section><!--Section ADM-->
</main>
</body>
<?php
    include 'footer.php';

?>