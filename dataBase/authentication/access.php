<?php
  session_start();
  // Verificamos se o usu�rio est� logado.
  if(!isset($_SESSION['idUsuario'])
  || !isset($_SESSION['tipoPerfil'])
  || !isset($_SESSION['nomeUsuario'])){
    session_destroy();
    header('Location: ../../');
    exit;
  }
?>
