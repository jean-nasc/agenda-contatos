<?php

namespace app\models;

use app\models\DB;

Class Contato extends DB{
    
    function obterContatos(){
        $query = "SELECT * FROM contatos";
        $this->executeSQL($query);
        $this->getLista();
        return $this->getItens();
    }


    private function getLista(){
        $i = 1;
    
        while($lista = $this->listarDados()){
          $this->itens[$i] = array(
            'id' => $lista['id'],
            'cod' => $lista['cod'],
            'nome' => $lista['nome'],
            'email' => $lista['email'],
            'grupo' => $lista['grupo']
          );
    
          $i++;
        }
      }

}

?>