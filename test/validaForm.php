<?php


    session_start();// iniciando a sessão
    if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) { // verificando se o usuario é um administrador 
        header('location:index.php');
    }
    require '../admin/conexao.php'; // incluidndo o arquivo de conexao com o banco de dados...
    require '../app/resize-class.php'; // incluindo arquivo para redimensionar a imagem...

    $consulta = $cn->query('select * from tbl_produto');
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

 
    // Variaveis que recebem os valores a serem inseridos no banco de dados..
    $nomeProduto = $_POST['nomeproduto']; // Recebe o nome do produto...
    $peso = $_POST['peso']; // Recebe o peso do produto...
    $largura = $_POST['largura']; // Recebe a largura do produto...
    $altura = $_POST['altura']; // Recebe a altura do produto...
    $descricaoProduto = $_POST['descricaoproduto']; // Recebe a descrição do produto...
    $categorias = $_POST['sltcat']; // Recebe a categoria do produto...
    $qntEstoque = $_POST['qntestoque']; // Recebe a quentidade em estoque...
    $valorProduto = $_POST['valorproduto']; // Recebe o valor do produto...

    // Fazendo tratamento do formato do valor do produto antes de enviar para o baco...
    $rermoveponto = '.';  // Criando variável e atribuindo o valor de ponto para ela...
    $valorProduto = str_replace($rermoveponto, '', $valorProduto); // Removendo ponto de casa decimal,substituindo por vazio...
    $removevirgula = ','; // Criando uma variável e atribuido o valor de virgula para ela...
    $valorProduto = str_replace($removevirgula, '.', $valorProduto); // Removendo a virgula da casa decimal e substituindo por ponto...

     
    $imagemCapa1 = $_FILES['txtcapa1']; // Recebe a imagem selecionada no campo imagem capa1...
    $imagemCapa2 = $_FILES['txtcapa2']; // Recebe a imagem selecionada no campo imagem capa2...
    $imagemCapa3 = $_FILES['txtcapa3']; // Recebe a imagem selecionada no campo imagem capa3...


    $destino = '../public/assets/imgem/'; // Envia as imagens para a pasta imgem...

    // Gerando nome aleatorio para imagem
    // preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
    // do nome que esta na variavel $imagemCapa do parametro name e a $extensão vai receber o formato
    preg_match('/\.(jpg|jpeg|png|gif){1}$/i',$imagemCapa1['name'],$extencao1);
    preg_match('/\.(jpg|jpeg|png|gif){1}$/i',$imagemCapa2['name'],$extencao1);
    preg_match('/\.(jpg|jpeg|png|gif){1}$/i',$imagemCapa3['name'],$extencao1);
    
    // A função md5 vai gerar um valor randomico  com base no horario "time"
    // incrementar o ponto e a extensão
    // função md5 é criado para gerar criptografia
    $img_nome1 = md5(uniqid(time())).".".$extencao1[1];
    $img_nome2 = md5(uniqid(time())).".".$extencao1[1];
    $img_nome3 = md5(uniqid(time())).".".$extencao1[1];
    
    try { // Try para tentar inserir os valores no banco de dados...

        $cadastraprod = $cn->query("
        INSERT INTO tbl_produto(nome_produto, peso, largura, altura, descricao, id_categoria, imagen_produto, imagen_dois_produto, imagen_tres_produto, qnt_estoque, vl_produto) 
        VALUES ('$nomeProduto','$peso','$largura','$altura','$descricaoProduto','$categorias','$img_nome1','$img_nome2','$img_nome3','$qntEstoque','$valorProduto')");
    
        

        move_uploaded_file($imagemCapa1['tmp_name'], $destino.$img_nome1);             
        $resizeObj = new resize($destino.$img_nome1);
        $resizeObj -> resizeImage(750, 850, 'crop');
        $resizeObj -> saveImage($destino.$img_nome1, 100);

        move_uploaded_file($imagemCapa2['tmp_name'], $destino.$img_nome2);             
        $resizeObj = new resize($destino.$img_nome2);
        $resizeObj -> resizeImage(750, 850, 'crop');
        $resizeObj -> saveImage($destino.$img_nome2, 100);

        move_uploaded_file($imagemCapa3['tmp_name'], $destino.$img_nome3);             
        $resizeObj = new resize($destino.$img_nome3);
        $resizeObj -> resizeImage(750, 850, 'crop');
        $resizeObj -> saveImage($destino.$img_nome3, 100);
    header('location:../admin/cadastroProdutos.php');

    }catch(PDOException $e) { // Se não exploda um erro na tela...
        echo $e->getMessage();
    }

?>