<?php 
    session_start();
 include 'conexao.php';
 include 'menu.php';
 include 'menu-usuario.php';

 $consulta= $cn->query('SELECT nome_usuario,sobrenome, ds_email,ds_senha, ds_status, ds_endereco ,ds_cidade,no_cep FROM  tbl_usuario');
 $exibeDadosUser = $consulta->fetch(PDO::FETCH_ASSOC);

?>
<body>
<div class="dadosUser">
    <h3 class="text-center">Seus dados</h3>

    <div class="dados text-center">
        <div>
            <span><b>Nome:</b> <?php echo $exibeDadosUser['nome_usuario'];?></span>
        </div>
        <div>
            <span><b>Sobrenome:</b> <?php echo $exibeDadosUser['sobrenome'];?></span>
        </div>
        <div>
            <span><b>Endereço:</b> <?php echo $exibeDadosUser['ds_endereco'];?></span>
        </div>
        <div>
            <span><b>Cidade:</b> <?php echo $exibeDadosUser['ds_cidade'];?></span>
        </div>
        <div>
            <span><b>CEP:</b> <?php echo $exibeDadosUser['no_cep'];?></span>
        </div>
        <div>
            <span><b>Telefone:</b> (00)00000-0000</span>
        </div>
    </div>

    <div class="botaoAlteraDadosUser">
        <a href="">
            <button class="btn btn-lg btn-info">Alterar dados</button>
        </a>
    </div>

</div>
</body>

<?php

include 'footer.php';