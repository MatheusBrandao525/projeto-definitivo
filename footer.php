<?php 
include 'conexao.php';
?>

<footer class="text-center footer">


<span class="fa fa-facebook" aria-hidden="true" style="font-size: 40px;"></span>
<span class="fa fa-twitter" aria-hidden="true" style="font-size: 40px; margin-left: 20px;"></span>
<span class="fa fa-youtube" aria-hidden="true" style="font-size: 40px; margin-left: 20px;"></span>
<br><br>
<span class="fa fa-cc-mastercard" aria-hidden="true" style="font-size: 40px; color:cadetblue"></span>
<span class="fa fa-cc-visa" aria-hidden="true" style="font-size: 40px; margin-left: 20px; color:cadetblue"></span>
<span class="fa fa-cc-paypal" aria-hidden="true" style="font-size: 40px; margin-left: 20px; color:cadetblue"></span>
<span class="fa fa-money" aria-hidden="true" style="font-size: 40px; margin-left: 20px; color:cadetblue"></span>
<span class="fa fa-cc-amex" aria-hidden="true" style="font-size: 40px; margin-left: 20px; color:cadetblue"></span>

<p style="margin-top: 250px;margin-bottom:0px;">Site desenvolvido no curso de PHP com MySQL: Desenvolvimento por Matheus</p>

</footer>
<script>
            $(document).ready(function(){
            $('#icon').click(function(){
            $('ul').toggleClass('show')
        });
    });
            $(document).ready(function(){
            $('#categorias').click(function(){
            $('.dropdown-menu').toggleClass('show')
        });
    });

</script>   