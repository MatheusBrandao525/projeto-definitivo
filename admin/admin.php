<?php
    session_start();
    
    // Verificando se o usuario tem permissão para acessar esta pagina...
    if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
        header('location:index.php');
    }

    // Incluindo arquivos importantes...
    require '../app/menu.php';
    require '../app/menu-principal.php';

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
            <a href="../admin/cadastroProdutos.php"><!--Criar um formulario para casdastrar produtos-->
                <button class="btn btn-lg btn-primary botoesAdm">Cadastrar Produtos <i class="fas fa-plus"></i></button>
            </a>
            <a href="../admin/listarProdutoAlt.php"><!--Criar um formulario para alterar produtos-->
                <button class="btn btn-lg btn-info botoesAdm">Alterar Produtos <i class="fas fa-edit"></i></button>
            </a>
            <a href="../admin/indiceVendas.php"><!--Criar uma pagina que mostre todas as vendas realizadas-->
                <button class="btn btn-lg btn-success botoesAdm">Vendas <i class="fas fa-chart-line"></i></button>
            </a>
            <a href="../admin/mostraClientes.php"><!--Criar uma pagina para buscar e editar clientes-->
                <button class="btn btn-lg btn-secondary botoesAdm">Clientes <i class="fas fa-address-book"> </i></button>
            </a>
            <a href="../app/suporte.php"><!--Criar uma pagina que ofereça suporte ao usuario e que ensine-o a usar a plataforma e suas ferramentas-->
                <button class="btn btn-lg btn-dark botoesAdm">Supote <i class="fas fa-question"></i></button>
            </a>
            <a href="../app/config_conta.php"><!--Ao clicar no botao a pagina retorna para a pagina configurção de conta-->
                <button class="btn btn-lg btn-warning botoesAdm">Voltar <i class="fas fa-undo-alt"></i></button>
            </a>
        </div><!--Painel de controle-->
    </section><!--Section ADM-->
</main>
</body>
<?php
    require '../app/footer.php';

?>