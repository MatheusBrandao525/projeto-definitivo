<?php

include 'conexao.php';
include 'menu.php';
include 'menu-principal.php';

?>


<div class="row dadosCarrinho" style="margin-top: 15px;">

            <div class="col-sm-1 col-sm-offset-1">
                <h4>IMAGEM</h4>
            </div>
            
            
            <div class="col-sm-4 margin">
                <h4>NOME PRODUTO</h4>
            </div>	
            
            
            <div class="col-sm-2">
                <h4>VALOR DO PRODUTO</h4>
            </div>		
    
            <div class="col-sm-3">

                    <h4 class="qntDisponivel text-center" id="#qntcart">QUANTIDADE DISPONIVEL</h4>
                
            </div>
    
            <div class="col-sm-2 col-xs-offset-right-1">
            </div> 


			
            <div class="col-sm-1 col-sm-offset-1">
                <img src="imgem/" class="img-responsiva">
            </div>
            
            
            <div class="col-sm-4 margin nomeProduto">
                <h4>NOME PRODUTO</h4>
            </div>	
            
            
            <div class="col-sm-2 precoItem">
                <h4>VALOR DO PRODUTO</h4>
            </div>		
    
            <div class="col-sm-3 quantidadeDisponivel">

                    <h4 class="qntDisponivel text-center" id="#qntcart">QUANTIDADE DISPONIVEL</h4>
                
            </div>
    
            <div class="col-sm-2 col-xs-offset-right-1 botaoAdicionarAoCarrinhoListaDeDesejos">
                <a href="" class="btn btn-block btn-success adc-listaDesejos">Adicionar ao carrinho</a>
            </div> 
            
</div>	
        