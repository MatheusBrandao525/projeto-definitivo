<?php
session_start();

if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
    header('location:index.php');
}

    include 'conexao.php'; // incluinda a conexao com o banco de dados
    include 'menu.php';

    $ID = $_GET['id']; // variavel que recebe o ID do produto via GET

    $destino = 'imgem/'; // Localizar a pasta onde estão as imagens

    $consulta = $cn->query("SELECT * FROM tbl_produto WHERE id_produto = '$ID'"); // chamando todos os dados do produto cujo o ID foi passado pelo GET

    $exibe = $consulta->fetch(PDO::FETCH_ASSOC); // criando um array para exibir os dados

    $excluir = $cn->query("DELETE FROM tbl_produto WHERE id_produto = '$ID'"); // deletando do banco de dados o resgistro do produto cujo o ID foi passado pelo GET

    $foto1 = $exibe['imagen_produto']; // variavel que recebe o nome da imagem 

    if($foto1 !=''){

        unlink($destino.$foto1); // excluindo a imagem do diretorio
    }

?>
    <div class="text-center erroLogin">
    <div>
        <h3>Produto excluido com sucesso!</h3>
        <div>
            <a href="listarProdutoAlt.php">
                <button class="btn btn-sm btn-default" style="border:0.5px solid; width:250px; font-size:18px; margin:20px 0;">
                                
                                <span class="glyphicon glyphicon-pencil">Voltar</span>
                                
                </button>
            </a>
        </div>
    </div>
</div>