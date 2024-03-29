<?php


    session_start();

    if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
        header('location:../public/index.php');
    }
    require '../admin/conexao.php'; // incluidndo o arquivo de conexao com o banco de dados...
    require '../admin/resize-class.php'; // incluindo arquivo para redimensionar a imagem...

    $id_produtoAlt = $_GET['id_altera'];

    $consultaAlt = $cn->query("select imagen_produto from tbl_produto where id_produto = '$id_produtoAlt'");
    $exibe = $consultaAlt->fetch(PDO::FETCH_ASSOC);


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


    $destino = '../public/assets/imgem/'; // Envia as imagens para a pasta imgem...

    // Gerando nome aleatorio para imagem
    // preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
    // do nome que esta na variavel $imagemCapa do parametro name e a $extensão vai receber o formato
    if(!empty($imagemCapa['name'])){
        
    preg_match('/\.(jpg|jpeg|png|gif){1}$/i',$imagemCapa['name'],$extencao1);
    
    // A função md5 vai gerar um valor randomico  com base no horario "time"
    // incrementar o ponto e a extensão
    // função md5 é criado para gerar criptografia
    $img_nome = md5(uniqid(time())).".".$extencao1[1];
    $uploadFoto = 1; // se a variavel criada for 1 precisará trocar a imagem

    }else{
        $img_nome = $exibe['imagen_produto'];
        $uploadFoto = 0;
    }

    try { // Try para tentar inserir os valores no banco de dados...

        $alterar = $cn->query("UPDATE tbl_produto SET
        nome_produto = '$nomeProduto', 
        descricao = '$descricaoProduto', 
        id_categoria = '$categorias', 
        imagen_produto = '$img_nome', 
        qnt_estoque = '$qntEstoque', 
        vl_produto = '$valorProduto' 

        WHERE  id_produto = '$id_produtoAlt'
       ");
    
    
    if($uploadFoto ==1){
    move_uploaded_file($imagemCapa['tmp_name'], $destino.$img_nome);             
    $resizeObj = new resize($destino.$img_nome);
    $resizeObj -> resizeImage(750, 850, 'crop');
    $resizeObj -> saveImage($destino.$img_nome, 100);

    }

    header("location:../admin/admin.php");

    }catch(PDOException $e) { // Se não exploda um erro na tela...
        echo $e->getMessage();
    }

?>