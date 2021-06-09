<?php

namespace app\models;

use app\models\DB;
use app\models\Route;

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
  }

Class Login extends DB{

    private $email, $senha;

    function getLogin($email, $senha){

        $this->email = $email;
        $this->senha = $senha;
    
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $params = array(
          ':email' => $this->email
        );
    
        $this->executeSQL($query, $params);
    
        $lista = $this->listarDados();
        $digitado = $this->senha;
        $banco = $lista['senha'];
    
    
        if(password_verify($digitado, $banco)){
    
          $_SESSION['USUARIO']['nome'] = $lista['nome'];
          $_SESSION['USUARIO']['email'] = $lista['email'];

          $result = true;
          
          Route::header(Route::pag_Home());

        }else{
          $result = false;
        }

        return $result;
    }


    static function usuarioLogado(){
        if(isset($_SESSION['USUARIO']['nome']) && isset($_SESSION['USUARIO']['email'])){
          return true;
        }else{
          return false;
        }
      }
    
      static function usuarioLogoff(){
        unset($_SESSION['USUARIO']);
        Route::header(Route::pag_Login());
      }

}
