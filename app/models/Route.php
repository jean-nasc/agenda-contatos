<?php

namespace app\models;

Class Route{

	public static $pag;

	static function get_Raiz(){
		return Config::SITE_URL . Config::SITE_FOLDER;
	}

	static function redirecionar($tempo, $pagina){
		$url = '<meta http-equiv="refresh" content="'.$tempo.'; url='. $pagina .'">';
		echo $url;
	}

	static function header($pagina){
		return header("Location: " . $pagina);
	}

	/* PÁGINAS FRONT-END */
	static function pag_Login(){
		return self::get_Raiz(). '/login';
	}

	static function pag_Home(){
		return self::get_Raiz(). '/home';
	}

	static function pag_Cadastro(){
		return self::get_Raiz(). '/cadastro';
	}

	static function pag_Logoff(){
		return self::get_Raiz(). '/logoff';
	}

	/* URL AMIGÁVEL FRONT-END */
	static function get_Pages(){
		if(isset($_GET['pag'])){

			$pagina = $_GET['pag'];

			self::$pag = explode('/', $pagina);

			$pagina = 'app/controllers/' .self::$pag[0] . '.php';

			if(file_exists($pagina)){
				include $pagina;
			}else{
				include 'app/controllers/404.php';
			}

		}else{
			include 'app/controllers/home.php';
		}
	}

}

?>
