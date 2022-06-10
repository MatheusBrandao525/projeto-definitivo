<?php

    include 'conexao.php';

    $consultaCategoria = $cn->query('SELECT * FROM tbl_categoria');

    

?>

<nav id="menu-principal">
            <ul>
                <li><a class="claselinkS" href="index.php">Home</a></li> <!--Link que redireciona para o Home-->
                <li><a class="claselinkS"  href="#produtos">Produtos</a></li> <!--Link que redireciona para os produtos usando scroll-havior.-->
                <li class="nav-item dropdown"> <!--Menu dropdown para as categorias-->
                    <a href="#" class="nav-link dropdown-toggle categoriaLink" id="categorias" data-toggle="dropdown">
                        Categorias
                    </a>
                    <div class="dropdown-menu">
                        <?php while($exibe_categoria = $consultaCategoria->fetch(PDO::FETCH_ASSOC)){ ?>
                        <a href="categorias.php?cat=<?php echo $exibe_categoria['id_categoria'];?>" class="dropdown-item"><?php echo $exibe_categoria['nome_categoria'];?></a>
                        <?php } ?>

                    </div>
                </li>
                <li><a class="claselinkS"  href="contato.php">Contato</a></li>
                <li><a class="claselinkS"  href="supote.php">Suporte</a></li>
            </ul>   
            <label id="icon">
                <i class="fas fa-bars"></i> <!--Icone de menu hamburguer-->
            </label>


 
        </nav>
        <div class="limpa"></div>