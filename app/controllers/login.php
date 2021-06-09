<?php

use app\models\Login;
use app\models\Route;

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
  }

if(Login::usuarioLogado()){
    Route::header(Route::pag_Home());
}

if(!empty($_POST['email']) && !empty($_POST['senha'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
  
    $login = new Login();
    $login->getLogin($email, $senha);
  }

echo template('login.html', array(
    "RAIZ" => Route::get_Raiz(),
    "PAG_HOME" => Route::pag_Home(),
    "PAG_CADASTRO" => Route::pag_Cadastro()
));
?>