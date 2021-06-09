<?php

require_once './connection.php';

if(
!empty($_POST['nomeInput']) &&
!empty($_POST['emailInput']) &&
!empty($_POST['grupoInput']) &&
!empty($_POST['telefoneInput']) &&
!empty($_POST['telDescricaoInput']) &&
!empty($_POST['cepInput']) &&
!empty($_POST['logradouroInput']) &&
!empty($_POST['numeroInput']) &&
!empty($_POST['bairroInput']) &&
!empty($_POST['cidadeInput']) &&
!empty($_POST['estadoInput']) &&
!empty($_POST['endDescricaoInput'])){

    $nomeInput = $_POST['nomeInput'];
    $emailInput = $_POST['emailInput'];
    $grupoInput = $_POST['grupoInput'];
    $telefoneInput = $_POST['telefoneInput'];
    $telDescricaoInput = $_POST['telDescricaoInput'];
    $cepInput = $_POST['cepInput'];
    $logradouroInput = $_POST['logradouroInput'];
    $complementoInput = $_POST['complementoInput'];
    $numeroInput = $_POST['numeroInput'];
    $bairroInput = $_POST['bairroInput'];
    $cidadeInput = $_POST['cidadeInput'];
    $estadoInput = $_POST['estadoInput'];
    $endDescricaoInput = $_POST['endDescricaoInput'];
    $cod = 1 . date('dmYHis');

  $stmt = $conn->prepare("INSERT INTO contatos (cod, nome, email, grupo) VALUES (:cod, :nome, :email, :grupo)");
  $params = array(
    ':cod'=>$cod,
    ':nome'=>strip_tags(trim(addslashes($nomeInput))),
    ':email'=>strip_tags(trim(addslashes($emailInput))),
    ':grupo'=>strip_tags(trim(addslashes($grupoInput)))
  );
  $stmt->execute($params);


  $stmt = $conn->prepare("INSERT INTO enderecos (contato_cod, cep, logradouro, complemento, numero, bairro, cidade, estado, end_descricao) VALUES (:contato_cod, :cep, :logradouro, :complemento, :numero, :bairro, :cidade, :estado, :end_descricao)");
  $params = array(
    ':contato_cod'=>$cod,
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


  $stmt = $conn->prepare("INSERT INTO telefones (contato_cod, numero_telefone, tel_descricao) VALUES (:contato_cod, :numero_telefone, :tel_descricao)");
  $params = array(
    ':contato_cod'=>$cod,
    ':numero_telefone'=>strip_tags(trim(addslashes($telefoneInput))),
    ':tel_descricao'=>strip_tags(trim(addslashes($telDescricaoInput)))
  );
  $stmt->execute($params);


  $stmt = $conn->prepare("SELECT * FROM grupos WHERE nome_grupo = :nome_grupo");
  $params = array(
    ':nome_grupo'=>strip_tags(trim(addslashes($grupoInput)))
  );
  $stmt->execute($params);
  $result = $stmt->fetchAll();

  if(count($result) == 0){

    $stmt = $conn->prepare("INSERT INTO grupos (nome_grupo) VALUES (:nome_grupo)");
    $params = array(
        ':nome_grupo'=>strip_tags(trim(addslashes(mb_strtoupper($grupoInput))))
    );
    $stmt->execute($params);

  }

  echo 'Contato cadastrado com sucesso!';

  }else{

  echo 'Ocorreu um erro!';

  }
