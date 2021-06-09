<?php

require_once './connection.php';

if(
!empty($_POST['nomeInput']) &&
!empty($_POST['emailInput']) &&
!empty($_POST['grupoInput']) &&
!empty($_POST['codigo'])){

    $nomeInput = $_POST['nomeInput'];
    $emailInput = $_POST['emailInput'];
    $grupoInput = $_POST['grupoInput'];
    $codigo = $_POST['codigo'];

  $stmt = $conn->prepare("UPDATE contatos SET nome = :nome, email = :email, grupo = :grupo WHERE cod = :cod");
  $params = array(
    ':cod'=>$codigo,
    ':nome'=>strip_tags(trim(addslashes($nomeInput))),
    ':email'=>strip_tags(trim(addslashes($emailInput))),
    ':grupo'=>strip_tags(trim(addslashes($grupoInput)))
  );
  $stmt->execute($params);


  echo 'Contato editado com sucesso!';

  }else{

  echo 'Ocorreu um erro!';

  }
