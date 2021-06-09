<?php

namespace app\models;

use app\models\DB;

Class Usuario extends DB{

    private $nome, $email, $senha;

    function cadastrarUsuario($nome, $email, $senha){

        $this->nome = strip_tags(trim(addslashes($nome)));
        $this->email = strip_tags(trim(addslashes($email)));
        $this->senha = password_hash($senha, PASSWORD_BCRYPT, array('cost'=>12));

        $this->getUsuario($this->email);
    
        if($this->totalDados() > 0){
    
          $result = false;
    
        }else{
    
          $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    
          $params = array(
            ':nome' => $this->nome,
            ':email' => $this->email,
            ':senha' => $this->senha
          );
    
          $this->executeSQL($query, $params);

          $result = true;

          Route::header(Route::pag_Login());
    
        }
    
        return $result;
      }


      private function getUsuario($email){
    
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $params = array(
          ':email' => $email
        );
    
        $this->executeSQL($query, $params);
    
        $this->getLista();
      }


      private function getLista(){
        $i = 1;
    
        while($lista = $this->listarDados()){
          $this->itens[$i] = array(
            'nome' => $lista['nome'],
            'email' => $lista['email'],
            'senha' => $lista['senha']
          );
    
          $i++;
        }
      }

}

?>