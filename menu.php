<?php
    include 'conexao.php';
    include 'cabecalho.html';



?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a href="#" class="nav-brand " style="margin:0 1%;">
        <img src="imagens/logo - Copia.png" alt="" style="width: 40px;">
    </a>


    <div class="navbar-header">
			<button type="button" class="navbar-toggler bg-dark" data-toggle="collapse" data-target="#links-menu" style="margin-bottom: 15px;">
					<i class="material-icons">menu</i>
			</button>
	</div>

    <nav id="links-menu" class="collapse navbar-collapse text-center">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
            </li>

            <li class="nav-item">
                <a href="#produtos" class="nav-link">Produtos</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">Sobre</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">Contato</a>
            </li>


            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="categorias" data-toggle="dropdown">
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

        </ul>
    </nav>
</nav><!--Nav-principal-do-menu-->

