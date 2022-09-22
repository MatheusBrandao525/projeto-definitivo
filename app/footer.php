<?php 
include 'conexao.php';
?>

<footer class="text-center footer">
<p>&reg - Todos os direitos reservados: Desenvolvimento por Matheus 2022</p>

<span class="fa fa-facebook" aria-hidden="true" style="font-size: 40px;"></span>
<span class="fa fa-twitter" aria-hidden="true"></span>
<span class="fa fa-youtube" aria-hidden="true"></span>
<br><br>
<span class="fa fa-cc-mastercard" aria-hidden="true" style="font-size: 40px; color:cadetblue"></span>
<span class="fa fa-cc-visa" aria-hidden="true"></span>
<span class="fa fa-cc-paypal" aria-hidden="true"></span>
<span class="fa fa-money" aria-hidden="true"></span>
<span class="fa fa-cc-amex" aria-hidden="true"></span>



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


    function showModal() {
    var element = document.getElementById("modal");
    element.classList.add("show-modal");
}

function hideModal(){
    var element = document.getElementById("modal");
    element.classList.remove("show-modal");
}

function showModalCat() {
    var element = document.getElementById("modalCategorias");
    element.classList.add("show-modal");

}

function hideModalCat(){
    var element = document.getElementById("modalCategorias");
    element.classList.remove("show-modal");
}

</script>   