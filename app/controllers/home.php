<?php

use app\models\Contato;
use app\models\Endereco;
use app\models\Grupo;
use app\models\Login;
use app\models\Route;
use app\models\Telefone;

if(!Login::usuarioLogado()){
    Route::header(Route::pag_Login());
}

$grupos = new Grupo();
$contatos = new Contato();
$enderecos = new Endereco();
$telefones = new Telefone();

echo template('home.html', array(
    "RAIZ" => Route::get_Raiz(),
    "GRUPOS" => $grupos->obterGrupos(),
    "CONTATOS" => $contatos->obterContatos(),
    "ENDERECOS" => $enderecos->obterEnderecos(),
    "TELEFONES" => $telefones->obterTelefones(),
    "PAG_LOGOFF" => Route::pag_Logoff(),
    "USUARIO" => (isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO'] : null)
));
?>