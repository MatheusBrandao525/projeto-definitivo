<?php
    session_start();
    require '../app/menu.php';

    $consulta= $cn->query('select nome_usuario, ds_email, ds_status, ds_endereco from  tbl_usuario');
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);

?>
<body>
    

<div class="conteiner-fluid">
    <?php require '../app/menu-usuario.php'; ?>
</div>
<div class="conteudo-indice-vendas">
    <div class="row row-indice-vendas">
        <div class="col-sm-03 sidbar-indice-vendas">
            <p onclick="showModalIndice();hideModalGrafico();hideModalMaisVendido();hideModalMaisPesquisado()">Vendas</p>
            <p onclick="hideModalIndice(); showModalGrafico();hideModalMaisVendido();hideModalMaisPesquisado()">Grafico de vendas</p>
            <p onclick="hideModalGrafico(); showModalMaisVendido();hideModalIndice();hideModalMaisPesquisado()">Produtos mais vendidos</p>
            <p onclick="hideModalMaisVendido(); showModalMaisPesquisado();hideModalIndice();hideModalGrafico()">Produtos mais buscados</p>
        </div><!-- sidbar-indice-vendas -->

        <div class="col-sm-9 dados-indice-vendas modalIndice" id="modal-indice">
            <div class="barra-indice-vendas">
                <h3>Vendas</h3>
                <div class="filtrar-indices">
                    <button class="btn btn-lg btn-default btn-indice">Filtros </button>
                    <div class="limpa"></div>
                </div><!-- filtrar-indices -->
            </div><!-- barra-indice-vendas -->
            <div class="row mostrar-indices">
                <div class="col-sm-7 mostra-indices-01">
                    <div class="box-indice-ultimas-vendas">
                        <div class="titlo-indice">
                            <h5>Ultimas vendas realizadas</h5>
                        </div><!-- titlo-indice -->

                        <div class="row indice-dados espaco-inferior">
                            <div class="col-sm-2 dados-venda numero-venda">
                                <span class="titulo-dados">Nº Venda</span>
                            </div>
                            <div class="col-sm-4 dados-venda">
                                <span class="titulo-dados">Tiket</span>
                            </div><div class="col-sm-4 dados-venda">
                                <span class="titulo-dados">Cliente</span>
                            </div><div class="col-sm-2 dados-venda">
                                <span class="titulo-dados">Valor</span>
                            </div> 
                        </div><!-- indice-dados -->

                        
                        <div class="row indice-dados">
                            <div class="col-sm-2 dados-venda numero-venda">
                                <span>Nº 06776</span>
                            </div>
                            <div class="col-sm-4 dados-venda">
                                <a href="#"><span>jk88a78w7hd7a89wu</span></a>
                            </div><div class="col-sm-4 dados-venda">
                                <span>Fulano01</span>
                            </div><div class="col-sm-2 dados-venda">
                                <span>R$ 250,00</span>
                            </div> 
                        </div><!-- indice-dados -->
                        
                    </div><!-- box-indice-ultimas-vendas -->
                </div><!-- mostra-indices-01 -->

                <div class="col-sm-5 mostra-indices-02">
                    <div class="centro-indice">
                        <div class="box-indice-lucro">
                            <h5>Seu lucro</h5>
                            <div class="indice-lucro">
                                <h4>R$ 99.999,00</h4>
                            </div>
                        </div><!-- box-indice-lucro -->

                        <div class="box-indice-grafico">
                            <h5>Resumo</h5>
                            <div class="indice-resumo">
                                <h4>10.736 Vendas <i class="fas fa-chart-line"></i></h4>
                            </div>
                        </div><!-- box-indice-grafico -->
                    </div><!-- centro-indice -->

                </div><!-- mostra-indices-02 -->
            </div><!-- mostrar-indices -->
        </div><!-- dados-indice-vendas -->


        <div class="col-sm-9 dados-indice-vendas modalGrafico" id="modal-grafico">
            <div class="barra-indice-vendas">
                <h3>Gráfico</h3>
                <div class="filtrar-indices">
                    <button class="btn btn-lg btn-default btn-indice">Filtros </button>
                    <div class="limpa"></div>
                </div><!-- filtrar-indices -->
            </div><!-- barra-indice-vendas -->
            <div class="row mostrar-grafico">
                <div class="col-sm-10 mostra-grafico-01">
                    <div class="box-grafico">
                        <div class="titlo-grafico">
                            <h5>Resumo de vendas realizadas</h5>
                        </div><!-- titlo-indice -->

                        <div class="row indice-dados espaco-inferior">
                            <div class="col-sm-2 dados-venda numero-venda">
                                <span class="titulo-dados">Nº Venda</span>
                            </div>
                            <div class="col-sm-4 dados-venda">
                                <span class="titulo-dados">Tiket</span>
                            </div><div class="col-sm-4 dados-venda">
                                <span class="titulo-dados">Cliente</span>
                            </div><div class="col-sm-2 dados-venda">
                                <span class="titulo-dados">Valor</span>
                            </div> 
                        </div><!-- indice-dados -->

                        
                        <div class="row indice-dados">
                            <div class="col-sm-2 dados-venda numero-venda">
                                <span>Nº 06776</span>
                            </div>
                            <div class="col-sm-4 dados-venda">
                                <a href="#"><span>jk88a78w7hd7a89wu</span></a>
                            </div><div class="col-sm-4 dados-venda">
                                <span>Fulano01</span>
                            </div><div class="col-sm-2 dados-venda">
                                <span>R$ 250,00</span>
                            </div> 
                        </div><!-- indice-dados -->
                        
                    </div><!-- box-indice-ultimas-vendas -->
                </div><!-- mostra-indices-01 -->

                <div class="col-sm-2 mostra-grafico-02">
                    <div class="centro-indice">
                        <div class="box-grafico01">
                            <h5>Atual</h5>
                            <div class="grafico-atual">
                                <h4>R$ 99.999,00</h4>
                            </div>
                        </div><!-- box-indice-lucro -->

                        <div class="box-grafico02">
                            <h5>Anterior</h5>
                            <div class="grafico-anterior">
                                <h4>R$ 76.980,00</h4>
                            </div>
                        </div><!-- box-indice-grafico -->
                    </div><!-- centro-indice -->

                </div><!-- mostra-indices-02 -->
            </div><!-- mostrar-indices -->
        </div><!-- dados-indice-vendas -->



        <div class="col-sm-9 dados-indice-vendas modalMaisVendido" id="modal-mais-vendido">
            <div class="barra-indice-vendas">
                <h3>Mais vendidos</h3>
                <div class="filtrar-indices">
                    <button class="btn btn-lg btn-default btn-indice">Filtros </button>
                    <div class="limpa"></div>
                </div><!-- filtrar-indices -->
            </div><!-- barra-indice-vendas -->
            <div class="row mostrar-indices">
                <div class="col-sm-7 mostra-indices-01">
                    <div class="box-indice-ultimas-vendas">
                        <div class="titlo-indice">
                            <h5>Produtos mais vendidos</h5>
                        </div><!-- titlo-indice -->

                        <div class="row indice-dados espaco-inferior">
                            <div class="col-sm-2 dados-venda numero-venda">
                                <span class="titulo-dados">Ranking</span>
                            </div>
                            <div class="col-sm-4 dados-venda">
                                <span class="titulo-dados">Nome Produto</span>
                            </div><div class="col-sm-4 dados-venda">
                                <span class="titulo-dados">Categoria</span>
                            </div><div class="col-sm-2 dados-mais-vendido">
                                <span class="titulo-dados">Valor</span>
                            </div> 
                        </div><!-- indice-dados -->

                        
                        <div class="row indice-dados">
                            <div class="col-sm-2 dados-venda numero-venda">
                                <span>Nº 06776</span>
                            </div>
                            <div class="col-sm-4 dados-venda">
                                <a href="#"><span>jk88a78w7hd7a89wu</span></a>
                            </div><div class="col-sm-4 dados-venda">
                                <span>categia-teste</span>
                            </div><div class="col-sm-2 dados-mais-vendido">
                                <span>R$ 250,00</span>
                            </div> 
                        </div><!-- indice-dados -->
                        
                    </div><!-- box-indice-ultimas-vendas -->
                </div><!-- mostra-indices-01 -->

                <div class="col-sm-5 mostra-indices-02">
                    <div class="centro-indice">
                        <div class="box-indice-lucro">
                            <h5>Nº 1</h5>
                            <div class="indice-lucro">
                                <h4>Nome Produto</h4>
                            </div>
                        </div><!-- box-indice-lucro -->

                        <div class="box-indice-grafico">
                            <h5>Total de vendas</h5>
                            <div class="indice-resumo">
                                <h4>10.736 Vendas <i class="fas fa-chart-line"></i></h4>
                            </div>
                        </div><!-- box-indice-grafico -->
                    </div><!-- centro-indice -->

                </div><!-- mostra-indices-02 -->
            </div><!-- mostrar-indices -->
        </div><!-- dados-indice-vendas -->




        <div class="col-sm-9 dados-indice-vendas modalMaisPesquisado" id="modal-mais-pesquisado">
            <div class="barra-indice-vendas">
                <h3>Mais buscados</h3>
                <div class="filtrar-indices">
                    <button class="btn btn-lg btn-default btn-indice">Filtros </button>
                    <div class="limpa"></div>
                </div><!-- filtrar-indices -->
            </div><!-- barra-indice-vendas -->
            <div class="row mostrar-indices">
                <div class="col-sm-7 mostra-indices-01">
                    <div class="box-indice-ultimas-vendas">
                        <div class="titlo-indice">
                            <h5>Produtos mais buscados</h5>
                        </div><!-- titlo-indice -->

                        <div class="row indice-dados espaco-inferior">
                            <div class="col-sm-2 dados-venda numero-venda">
                                <span class="titulo-dados">Ranking</span>
                            </div>
                            <div class="col-sm-4 dados-venda">
                                <span class="titulo-dados">Nome produto</span>
                            </div><div class="col-sm-4 dados-venda">
                                <span class="titulo-dados">Categoria</span>
                            </div><div class="col-sm-2 dados-mais-buscado">
                                <span class="titulo-dados">Valor</span>
                            </div> 
                        </div><!-- indice-dados -->

                        
                        <div class="row indice-dados">
                            <div class="col-sm-2 dados-venda numero-venda">
                                <span>Nº 06776</span>
                            </div>
                            <div class="col-sm-4 dados-venda">
                                <a href="#"><span>Produto-teste</span></a>
                            </div><div class="col-sm-4 dados-venda">
                                <span>Categoria-teste</span>
                            </div><div class="col-sm-2 dados-venda">
                                <span>R$ 250,00</span>
                            </div> 
                        </div><!-- indice-dados -->
                        
                    </div><!-- box-indice-ultimas-vendas -->
                </div><!-- mostra-indices-01 -->

                <div class="col-sm-5 mostra-indices-02">
                    <div class="centro-indice">
                        <div class="box-indice-lucro">
                            <h5>Nº 1</h5>
                            <div class="indice-lucro">
                                <h4>10.736</h4>
                            </div>
                        </div><!-- box-indice-lucro -->

                        <div class="box-indice-grafico">
                            <h5>Total de buscas</h5>
                            <div class="indice-resumo">
                                <h4>10.736</h4>
                            </div>
                        </div><!-- box-indice-grafico -->
                    </div><!-- centro-indice -->

                </div><!-- mostra-indices-02 -->
            </div><!-- mostrar-indices -->
        </div><!-- dados-indice-vendas -->



    </div><!-- row-indice-vendas -->

</div><!-- conteudo-indice-vendas -->

</body>







<?php
    require '../app/footer.php';

?>