<?php
    session_start();
    
    // Verificando se o usuario tem permissão para acessar esta pagina...
    if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
        header('location:index.php');
    }

    // Incluindo arquivos importantes...
    require '../app/menu.php';
    require '../app/menu-usuario.php';

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
                <a href="../admin/cadastroProdutos.php" class="btn btn-lg btn-secondary botoesAdm">Cadastrar Produtos <i class="fas fa-plus"></i></a>

                <a href="../admin/listarProdutoAlt.php" class="btn btn-lg btn-secondary botoesAdm">Alterar Produtos <i class="fas fa-edit"></i></a>

                <a href="../admin/indiceVendas.php" class="btn btn-lg btn-secondary botoesAdm">Vendas <i class="fas fa-chart-line"></i></a>

                <a href="../admin/clientes.php" class="btn btn-lg btn-secondary botoesAdm">Clientes <i class="fas fa-address-book"></i></a>

                <a href="../app/suporte.php" class="btn btn-lg btn-secondary botoesAdm">Supote <i class="fas fa-question"></i></a>
                
                <a href="../app/config_conta.php" class="btn btn-lg btn-secondary botoesAdm">Voltar <i class="fas fa-undo-alt"></i></a>
            </div><!--Painel de controle-->

            <div class="painelDeControle">
                <a href="../admin/gerenciarPedidos.php" class="btn btn-lg btn-secondary botoesAdm">Gerenciar Pedidos <i class="fas fa-truck"></i></a>

                <a href="../admin/listarProdutoAlt.php" class="btn btn-lg btn-secondary botoesAdm">Gerenciar Feedbacks <i class="fas fa-comments"></i></a>

                <a href="../admin/indiceVendas.php" class="btn btn-lg btn-secondary botoesAdm">Vendas <i class="fas fa-chart-line"></i></a>

                <a href="../admin/mostraClientes.php" class="btn btn-lg btn-secondary botoesAdm">Clientes <i class="fas fa-address-book"></i></a>

                <a href="../app/suporte.php" class="btn btn-lg btn-secondary botoesAdm">Supote <i class="fas fa-question"></i></a>
                
                <a href="../app/config_conta.php" class="btn btn-lg btn-secondary botoesAdm">Voltar <i class="fas fa-undo-alt"></i></a>
            </div><!--Painel de controle-->
        </section><!--Section ADM-->
    </main>
</body>
<?php
    require '../app/footer.php';

?>