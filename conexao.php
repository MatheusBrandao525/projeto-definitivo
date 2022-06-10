<?php
   $servidor ="database";
   // conexao com minha maquina pessoal...

   $usuario ="Matheus";
   $senha ="1exagon1@";
   $banco ="db_loja_def";


   // conexao com a maquina do meu trabalho...


   $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>