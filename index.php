<?php

use app\models\Route;

require_once './vendor/autoload.php';

Route::get_Pages();

function template($pagina, $array=[]){
	$loader = new \Twig\Loader\FilesystemLoader('app/views');
	$twig = new \Twig\Environment($loader);
	return $twig->render($pagina, $array);
}

?>
