<?php
   $servidor ="database";
   // conexao com minha maquina pessoal...

   $usuario ="docker";
   $senha ="docker";
   $banco ="docker";


   // conexao com a maquina do meu trabalho...


   $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>