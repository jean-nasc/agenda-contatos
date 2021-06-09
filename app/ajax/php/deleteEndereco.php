<?php

require_once './connection.php';

if(!empty($_POST['id'])){

    $id = $_POST['id'];

  $stmt = $conn->prepare("DELETE FROM enderecos WHERE id = $id");
  $stmt->execute();

  echo 'Endereço excluído com sucesso!';
  
  }else{

  echo 'Ocorreu um erro!';

  }
