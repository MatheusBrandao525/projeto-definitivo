<?php


    session_start();
    if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
        header('location:index.php');
    }
    include 'conexao.php'; // incluidndo o arquivo de conexao com o banco de dados...
    include 'resize-class.php'; // incluindo arquivo para redimensionar a imagem...

    $consulta = $cn->query('select * from tbl_produto');
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);


    // Variaveis que recebem os valores a serem inseridos no banco de dados..
    $nomeProduto = $_POST['nomeproduto']; // Recebe o nome do produto...
    $descricaoProduto = $_POST['descricaoproduto']; // Recebe a descrição do produto...
    $categorias = $_POST['sltcat']; // Recebe a categoria do produto...
    $qntEstoque = $_POST['qntestoque']; // Recebe a quentidade em estoque...
    $valorProduto = $_POST['valorproduto']; // Recebe o valor do produto...

    // Fazendo tratamento do formato do valor do produto antes de enviar para o baco...
    $rermoveponto = '.';  // Criando variável e atribuindo o valor de ponto para ela...
    $valorProduto = str_replace($rermoveponto, '', $valorProduto); // Removendo ponto de casa decimal,substituindo por vazio...
    $removevirgula = ','; // Criando uma variável e atribuido o valor de virgula para ela...
    $valorProduto = str_replace($removevirgula, '.', $valorProduto); // Removendo a virgula da casa decimal e substituindo por ponto...

     
    $imagemCapa = $_FILES['txtcapa']; // Recebe a imagem selecionada no campo imagem capa...


    $destino = 'imgem/'; // Envia as imagens para a pasta imgem...

    // Gerando nome aleatorio para imagem
    // preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
    // do nome que esta na variavel $imagemCapa do parametro name e a $extensão vai receber o formato
    preg_match('/\.(jpg|jpeg|png|gif){1}$/i',$imagemCapa['name'],$extencao1);
    
    // A função md5 vai gerar um valor randomico  com base no horario "time"
    // incrementar o ponto e a extensão
    // função md5 é criado para gerar criptografia
    $img_nome = md5(uniqid(time())).".".$extencao1[1];

    try { // Try para tentar inserir os valores no banco de dados...

        $cadastraprod = $cn->query("
        INSERT INTO tbl_produto(nome_produto, descricao, id_categoria, imagen_produto, qnt_estoque, vl_produto) 
        VALUES ('$nomeProduto','$descricaoProduto','$categorias','$img_nome','$qntEstoque','$valorProduto')");
    
    

    move_uploaded_file($imagemCapa['tmp_name'], $destino.$img_nome);             
    $resizeObj = new resize($destino.$img_nome);
    $resizeObj -> resizeImage(900, 950, 'crop');
    $resizeObj -> saveImage($destino.$img_nome, 100);
    header('location:index.php');

    }catch(PDOException $e) { // Se não exploda um erro na tela...
        echo $e->getMessage();
    }

?>