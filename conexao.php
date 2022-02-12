<?php
   $servidor ="localhost";
   $usuario ="Matheus";
   $senha ="1exagon1@";
   $banco ="db_loja_def";

   $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>