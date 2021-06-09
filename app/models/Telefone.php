<?php

namespace app\models;

use app\models\DB;

Class Telefone extends DB{
    
    function obterTelefones(){
        $query = "SELECT * FROM telefones";
        $this->executeSQL($query);
        $this->getLista();
        return $this->getItens();
    }


    private function getLista(){
        $i = 1;
    
        while($lista = $this->listarDados()){
          $this->itens[$i] = array(
            'id' => $lista['id'],
            'contato_cod' => $lista['contato_cod'],
            'numero_telefone' => $lista['numero_telefone'],
            'tel_descricao' => $lista['tel_descricao']
          );
    
          $i++;
        }
      }

}

?>