<?php

use app\models\Login;
use app\models\Route;

if(!Login::usuarioLogado()){
  Route::header(Route::pag_Login());
}

Login::usuarioLogoff();

?>
