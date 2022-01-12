<?php
    session_start();
    include 'cabecalho.html';
    include 'conexao.php';
    include 'menu.php';

?>

<!--Fazer a validação para que um usuario qualquer não consiga acessar esta pagina através da URL-->

<main>
    <section class="container adm">
        <div class="painelDeControle">
            <a href=""><!--Criar um formulario para casdastrar produtos-->
                <button class="btn btn-lg btn-primary botoesAdm">Cadastrar Produtos <i class="fas fa-plus"></i></button>
            </a>
            <a href=""><!--Criar um formulario para alterar produtos-->
                <button class="btn btn-lg btn-info botoesAdm">Alterar Produtos <i class="fas fa-edit"></i></button>
            </a>
            <a href=""><!--Criar uma pagina para buscar e excluir produtos-->
                <button class="btn btn-lg btn-danger botoesAdm">Excluir Produtos <i class="fas fa-times"></i></button>
            </a>
            <a href=""><!--Criar uma pagina que mostre todas as vendas realizadas-->
                <button class="btn btn-lg btn-success botoesAdm">Vendas <i class="fas fa-chart-line"></i></button>
            </a>
            <a href=""><!--Criar uma pagina para buscar e editar clientes-->
                <button class="btn btn-lg btn-secondary botoesAdm">Clientes <i class="fas fa-address-book"> </i></button>
            </a>
            <a href=""><!--Criar uma pagina que ofereça suporte ao usuario e que ensine-o a usar a plataforma e suas ferramentas-->
                <button class="btn btn-lg btn-dark botoesAdm">Supote <i class="fas fa-question"></i></button>
            </a>
        </div><!--Painel de controle-->
    </section><!--Section ADM-->
</main>

<?php
    include 'footer.php';

?>