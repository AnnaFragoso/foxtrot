<?php
  session_start();
  include ('../connect/index.php');

  // Verificando email e a senha com o banco de dados.
  if( isset($_POST['email']) && isset($_POST['senha']) ){

    // Tratar informa��es eviadas pelos usu�rio.
    $email = str_replace('"', '', // 1. Tirar " Passar 'vazio'
             str_replace("'", '', // 2. Tirar ' Passar 'vazio'
             str_replace(';', '', // 3. Tirar ; Passar 'vazio'
             str_replace('\\','', // 4. Tirar \ Passar 'vazio'
             $_POST['email'])))); // fechando todos os str_replace.
    $senha = str_replace('"', '',
             str_replace("'", '',
             str_replace(';', '',
             str_replace('\\','',
             $_POST['senha'])))); // fechando str_replace.

    include('../queries/query-user-login.php'); // consulta na tabela Usu�rio.

    $result = odbc_fetch_array($query); // Ler o resultado da consulta feito acima pelo odbc_eexc 'SELECT'

    if(!empty($result['idUsuario']) && !empty($result['tipoPerfil']) ){
      // Passando as informa��es do banco de dados para uma vari�vel global.
      $_SESSION['idUsuario'] = $result['idUsuario'];
      $_SESSION['tipoPerfil'] = $result['tipoPerfil'];
      $_SESSION['nomeUsuario'] = $result['nomeUsuario'];
      // $_SESSION[' '] � uma vari�vel array global, onde usamos para salvar a sess�o do usu�rio
      // e outros valores que precisar salvar na sess�o global.

      // Passar para p�gina php menu.
      header('Location: ../../pages/menu/');
    }else{
      $msgUsuario = 'E-mail ou Senha incorreto';
    }

  } // Fechando verifica��o de email e senha.

  include('index.tpl.php');
?>
