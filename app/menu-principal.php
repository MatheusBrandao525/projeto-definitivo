<?php

require "../admin/conexao.php"; // incluindo arquivo de conexão.

    $consultaCategoria = $cn->query('SELECT * FROM tbl_categoria');

    

?>

<nav id="menu-principal">
            <ul>
                <li><a class="claselinkS" href="../public/index.php">Home</a></li> <!--Link que redireciona para o Home-->
                <li><a class="claselinkS"  href="../public/index.php#produtos">Produtos</a></li> <!--Link que redireciona para os produtos usando scroll-havior.-->
                <li class="nav-item dropdown"> <!--Menu dropdown para as categorias-->
                    <button class="botaoCategorias dropdown-toggle" onclick="showModalCat()" id="categorias">CATEGORIAS</button>
                </li>
                <li><a class="claselinkS"  href="../app/contato.php">Contato</a></li>
                <li><a class="claselinkS"  href="../app/suporte.php">Suporte</a></li>
            </ul>   
            <label id="icon">
                <i class="fas fa-bars"></i> <!--Icone de menu hamburguer-->
            </label>


 
        </nav>
        <div class="limpa"></div>

        <div class="modalCategorias" id="modalCategorias">
            <div class="conteudoModalCategorias">

                <div class="row rowConteudoModalCategorias">
                <span class="fechaModal" onclick="hideModalCat()"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <div class="col-sm-03 bordaDireita">

                        <span class="dropdown-header">Masculino</span>
                        <div class="subCategorias">
                            <a href="" class=""><p>CategoriaUm</p></a>
                            <a href="" class=""><p>CategoriaDois</p></a>
                            <a href="" class=""><p>CategoriaTres</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                        </div>
                        <hr class="dropdown-divider">
                        <span class="dropdown-header">Feminina</span>
                        <div class="subCategorias">
                            <a href="" class=""><p>CategoriaUm</p></a>
                            <a href="" class=""><p>CategoriaDois</p></a>
                            <a href="" class=""><p>CategoriaTres</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                        </div>
                    </div>
                    <div class="col-sm-03 bordaDireita">

                        <span class="dropdown-header">Infantil</span>
                        <div class="subCategorias">
                            <a href="" class=""><p>CategoriaUm</p></a>
                            <a href="" class=""><p>CategoriaDois</p></a>
                            <a href="" class=""><p>CategoriaTres</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                        </div>
                        <hr class="dropdown-divider">
                        <span class="dropdown-header">Masculino</span>
                        <div class="subCategorias">
                            <a href="" class=""><p>CategoriaUm</p></a>
                            <a href="" class=""><p>CategoriaDois</p></a>
                            <a href="" class=""><p>CategoriaTres</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                        </div>
                    </div>
                    <div class="col-sm-03 bordaDireita">

                        <span class="dropdown-header">Relojoaria</span>
                        <div class="subCategorias">
                            <a href="" class=""><p>CategoriaUm</p></a>
                            <a href="" class=""><p>CategoriaDois</p></a>
                            <a href="" class=""><p>CategoriaTres</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                        </div>
                        <hr class="dropdown-divider">
                        <span class="dropdown-header">Relojoaria</span>
                        <div class="subCategorias">
                            <a href="" class=""><p>CategoriaUm</p></a>
                            <a href="" class=""><p>CategoriaDois</p></a>
                        </div>
                        <hr class="dropdown-divider"> 
                        <span class="dropdown-header">Relojoaria</span>
                        <div class="subCategorias">
                            <a href="" class=""><p>CategoriaUm</p></a>
                            <a href="" class=""><p>CategoriaDois</p></a>

                        </div>
                    </div>
                    <div class="col-sm-03 semBorda">

                        <span class="dropdown-header">Joalheria</span>
                        <div class="subCategorias">
                            <a href="" class=""><p>CategoriaUm</p></a>
                            <a href="" class=""><p>CategoriaDois</p></a>
                            <a href="" class=""><p>CategoriaTres</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                        </div>
                        <hr class="dropdown-divider">
                        <span class="dropdown-header">Joalheria</span>
                        <div class="subCategorias">
                            <a href="" class=""><p>CategoriaUm</p></a>
                            <a href="" class=""><p>CategoriaDois</p></a>
                            <a href="" class=""><p>CategoriaTres</p></a>
                            <a href="" class=""><p>CategoriaQuatro</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>