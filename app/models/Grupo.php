<?php

namespace app\models;

use app\models\DB;

Class Grupo extends DB{

    function obterGrupos(){
        $query = "SELECT * FROM grupos";
        $this->executeSQL($query);
        $this->getLista();
        return $this->getItens();
    }


    private function getLista(){
        $i = 1;
    
        while($lista = $this->listarDados()){
          $this->itens[$i] = array(
            'nome_grupo' => $lista['nome_grupo']
          );
    
          $i++;
        }
      }

}

?>