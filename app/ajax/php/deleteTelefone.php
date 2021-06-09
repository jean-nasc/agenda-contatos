<?php

require_once './connection.php';

if(!empty($_POST['id'])){

    $id = $_POST['id'];

  $stmt = $conn->prepare("DELETE FROM telefones WHERE id = $id");
  $stmt->execute();

  echo 'Telefone excluído com sucesso!';
  
  }else{

  echo 'Ocorreu um erro!';

  }
