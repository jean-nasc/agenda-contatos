<?php

namespace app\models;

use app\models\DB;

Class Endereco extends DB{
    
    function obterEnderecos(){
        $query = "SELECT * FROM enderecos";
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
            'cep' => $lista['cep'],
            'logradouro' => $lista['logradouro'],
            'complemento' => $lista['complemento'],
            'numero' => $lista['numero'],
            'bairro' => $lista['bairro'],
            'cidade' => $lista['cidade'],
            'estado' => $lista['estado'],
            'end_descricao' => $lista['end_descricao']
          );
    
          $i++;
        }
      }

}

?>