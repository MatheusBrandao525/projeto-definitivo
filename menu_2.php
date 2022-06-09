<?php
    //include "cabecalho.html";
    include "conexao.php";
?>
<!--<div class="container-fluid manusUser">-->
<div class="limpa"></div>

<!--</div>-->

    <div class="container-fluid " style=" height: 100%; padding-bottom:5px;">
    <div class="alinarNaMesmaLinha">
        <div class="formularioPesquisa pesquisar">
            
            <form action="busca.php" class="form-inline formularioPqs" method="get">
                <input type="search" id="inputpesquisar" class="form-control mr-sm-2 search" name="txtBuscar" placeholder="Buscar..">
                <button class="btn btn-success botaoProcurar" type="submit">Buscar</button>
            </form>
        </div>
        </div>
        
    </div><!--barra_de_pesquisa-->
    <div class="limpa"></div>

 