<?php

require_once './connection.php';

if(
!empty($_POST['telefoneInput']) &&
!empty($_POST['telDescricaoInput']) &&
!empty($_POST['id'])){

    $telefoneInput = $_POST['telefoneInput'];
    $telDescricaoInput = $_POST['telDescricaoInput'];
    $id = $_POST['id'];


  $stmt = $conn->prepare("UPDATE telefones SET numero_telefone = :numero_telefone, tel_descricao = :tel_descricao WHERE id = $id");
  $params = array(
    ':numero_telefone'=>strip_tags(trim(addslashes($telefoneInput))),
    ':tel_descricao'=>strip_tags(trim(addslashes($telDescricaoInput)))
  );
  $stmt->execute($params);

  echo 'Telefone editado com sucesso!';

  }else{

  echo 'Ocorreu um erro!';

  }
