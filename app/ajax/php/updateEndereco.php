<?php

require_once './connection.php';

if(
!empty($_POST['id']) &&
!empty($_POST['cepInput']) &&
!empty($_POST['logradouroInput']) &&
!empty($_POST['numeroInput']) &&
!empty($_POST['bairroInput']) &&
!empty($_POST['cidadeInput']) &&
!empty($_POST['estadoInput']) &&
!empty($_POST['endDescricaoInput'])){

    $id = $_POST['id'];
    $cepInput = $_POST['cepInput'];
    $logradouroInput = $_POST['logradouroInput'];
    $complementoInput = $_POST['complementoInput'];
    $numeroInput = $_POST['numeroInput'];
    $bairroInput = $_POST['bairroInput'];
    $cidadeInput = $_POST['cidadeInput'];
    $estadoInput = $_POST['estadoInput'];
    $endDescricaoInput = $_POST['endDescricaoInput'];


  $stmt = $conn->prepare("UPDATE enderecos SET cep = :cep, logradouro = :logradouro, complemento = :complemento, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado, end_descricao = :end_descricao WHERE id = $id");
  $params = array(
    ':cep'=>strip_tags(trim(addslashes($cepInput))),
    ':logradouro'=>strip_tags(trim(addslashes($logradouroInput))),
    ':complemento'=>strip_tags(trim(addslashes($complementoInput))),
    ':numero'=>strip_tags(trim(addslashes($numeroInput))),
    ':bairro'=>strip_tags(trim(addslashes($bairroInput))),
    ':cidade'=>strip_tags(trim(addslashes($cidadeInput))),
    ':estado'=>strip_tags(trim(addslashes($estadoInput))),
    ':end_descricao'=>strip_tags(trim(addslashes($endDescricaoInput)))
  );
  $stmt->execute($params);

  echo 'Endereço editado com sucesso!';

  }else{

  echo 'Ocorreu um erro!';

  }
