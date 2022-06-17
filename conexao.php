<?php
/*    $servidor ="database";
   // conexao com minha maquina pessoal...

   $usuario ="Matheus";
   $senha ="1exagon1@";
   $banco ="db_loja_def";
 */

   // conexao com a maquina do meu trabalho...
  $servidor ="localhost";

   $usuario ="root";
   $senha ="";
   $banco ="db_loja_def"; 



   $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>