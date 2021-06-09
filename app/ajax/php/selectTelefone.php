<?php

require_once './connection.php';

if(!empty($_POST['id'])){

    $id = $_POST['id'];

  $stmt = $conn->prepare("SELECT * FROM telefones WHERE id = $id");
  $stmt->execute();
  $result = $stmt->fetchAll();

  echo json_encode($result);


  }else{

  echo 'Ocorreu um erro!';

  }
