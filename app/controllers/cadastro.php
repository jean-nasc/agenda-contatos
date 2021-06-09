<?php

use app\models\Login;
use app\models\Route;
use app\models\Usuario;

if(Login::usuarioLogado()){
    Route::header(Route::pag_Home());
}

if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
  
    $usuario = new Usuario();
    $usuario->cadastrarUsuario($nome, $email, $senha);
  }

echo template('cadastro.html', array(
    "RAIZ" => Route::get_Raiz(),
    "PAG_LOGIN" => Route::pag_Login()
));
?>