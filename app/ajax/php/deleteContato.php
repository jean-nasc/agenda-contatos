<?php

require_once './connection.php';

if(!empty($_POST['codigo'])){

    $codigo = $_POST['codigo'];

  $stmt = $conn->prepare("DELETE contatos, enderecos, telefones FROM contatos INNER JOIN enderecos ON contatos.cod = enderecos.contato_cod INNER JOIN telefones ON contatos.cod = telefones.contato_cod WHERE contatos.cod = $codigo");
  $stmt->execute();

  echo 'Contato excluído com sucesso!';
  
  }else{

  echo 'Ocorreu um erro!';

  }
