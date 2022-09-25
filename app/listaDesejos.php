<?php
session_start();
require '../app/menu.php';
require '../app/menu-usuario.php';

?>


<div class="row dadosWishList">

            <div class="col-sm-12">
                <div class="row rowWishList">
                    <div class="col-sm-2">
                        <img src="imgem/" class="img-responsiva">
                    </div>
                    
                    
                    <div class="col-sm-3 wishNomeProduto">
                        <span>NOME PRODUTO</span>
                    </div>	
                    
                    
                    <div class="col-sm-2 wishValorProduto">
                        <span>VALOR DO PRODUTO</span>
                    </div>		
            
                    <div class="col-sm-3 quantidadeDisponivel">

                        <span class="qntDisponivel text-center" id="#qntcart">QUANTIDADE DISPONIVEL</span>

                    </div>
            
                    <div class="col-sm-2 botaoAdicionarAoCarrinhoListaDeDesejos">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="" class="btn btn-block btn-danger remove-listaDesejos">Remover</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="" class="btn btn-block btn-success adc-listaDesejos"><i class="material-icons"> shopping_cart</i></a>
                            </div>
                        </div>

                    </div> 
                </div>
            </div>	
    

    

            
</div>	
        