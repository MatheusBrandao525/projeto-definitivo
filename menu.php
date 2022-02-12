<?php

    include "conexao.php"; // incluindo arquivo de conexão.

?>

        <nav>
            <label class="logo">Minha Loja</label>
            <ul>
                <li><a class="claselinkS" href="index.php">Home</a></li> <!--Link que redireciona para o Home-->
                <li><a class="claselinkS"  href="#produtos">Produtos</a></li> <!--Link que redireciona para os produtos usando scroll-havior.-->
                <li class="nav-item dropdown"> <!--Menu dropdown para as categorias-->
                    <a href="#" class="nav-link dropdown-toggle categoriaLink" id="categorias" data-toggle="dropdown">
                        Categorias
                    </a>
                    <div class="dropdown-menu">
                        <a href="categorias.php?cat=Masculino" class="dropdown-item">Masculino</a>
                        <a href="categorias.php?cat=Feminino" class="dropdown-item">Feminino</a>
                        <a href="categorias.php?cat=Calçados" class="dropdown-item">Calçados</a>
                        <a href="categorias.php?cat=Relojoaria" class="dropdown-item">Relojoaria</a>
                        <a href="categorias.php?cat=Joalheria" class="dropdown-item">Joalheria</a>
                    </div>
                </li>
                <li><a class="claselinkS"  href="contato.php">Contato</a></li>
                <li><a class="claselinkS"  href="supote.php">Suporte</a></li>
            </ul>   

            <label id="icon">
                <i class="fas fa-bars"></i> <!--Icone de menu hamburguer-->
            </label>
            <div class="clear"></div> <!--Usando uma dive para limpar a flutuação dos elementos usando clear-both.-->

            <script>
                // Script js para fazer com que o dropdown funcione corretamente.
            $(document).ready(function(){
                // selecionando no documento o elemento cujo o id seja "categorias" e aplicando uma função ao clicar nesse elemento.
                $('#categorias').click(function(){
                    // Ao clicar no elemento cujo id é "categorias" entao exibe o elemento cuja classe é "dropdown-menu."  
                    $('.dropdown-menu').toggleClass('show')
                });
            });

            </script>   
        </nav>
