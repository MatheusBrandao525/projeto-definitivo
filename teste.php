<li class="nav-item dropdown"> <!--Menu dropdown para as categorias-->
                    <button class="nav-link btn btn-default dropdown-toggle categoriaLink" id="categorias" data-toggle="dropdown">
                        Categorias
                    </button>
                    <div class="dropdown-menu">
                        <?php while($exibe_categoria = $consultaCategoria->fetch(PDO::FETCH_ASSOC)){ ?>
                        <a href="categorias.php?cat=<?php echo $exibe_categoria['id_categoria'];?>" class="dropdown-item"><?php echo $exibe_categoria['nome_categoria'];?></a>
                        <?php } ?>

                    </div>
                </li>





<!-- Codigo Usado para exemplo de como fazer a modal Categorias -->

<!-- function showModal() {
    var element = document.getElementById("modalCategorias");
    element.classList.add("show-modal");

}

function hideModal(){
    var element = document.getElementById("modalCategorias");
    element.classList.remove("show-modal");
}
 -->