<?php

require_once './connection.php';

if(
!empty($_POST['telefoneInput']) &&
!empty($_POST['telDescricaoInput']) &&
!empty($_POST['codigo'])){

    $telefoneInput = $_POST['telefoneInput'];
    $telDescricaoInput = $_POST['telDescricaoInput'];
    $codigo = $_POST['codigo'];


  $stmt = $conn->prepare("INSERT INTO telefones (contato_cod, numero_telefone, tel_descricao) VALUES (:contato_cod, :numero_telefone, :tel_descricao)");
  $params = array(
    ':contato_cod'=>$codigo,
    ':numero_telefone'=>strip_tags(trim(addslashes($telefoneInput))),
    ':tel_descricao'=>strip_tags(trim(addslashes($telDescricaoInput)))
  );
  $stmt->execute($params);

  echo 'Telefone cadastrado com sucesso!';

  }else{

  echo 'Ocorreu um erro!';

  }
