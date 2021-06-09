<?php

require_once './connection.php';

if(!empty($_POST['codigo'])){

    $codigo = $_POST['codigo'];

  $stmt = $conn->prepare("SELECT * FROM contatos WHERE cod = $codigo");
  $stmt->execute();
  $result = $stmt->fetchAll();

  echo json_encode($result);


  }else{

  echo 'Ocorreu um erro!';

  }
