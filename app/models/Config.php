<?php

namespace app\models;

date_default_timezone_set('America/Sao_Paulo');

Class Config{

	const SITE_URL = "http://localhost",
	SITE_FOLDER = "/agenda",
	SITE_NAME = "Agenda de contatos";

	const DB_HOST = "localhost",
	DB_NAME = "agenda",
	DB_USER = "root",
	DB_PASS = "";


	const EMAIL_HOST = "",
	EMAIL_ADMIN = "",
	EMAIL_NAME = "",
	EMAIL_PASS = "",
	EMAIL_PORT = 465,
	EMAIL_SMTPAUTH = true,
	EMAIL_SMTPSECURE = "ssl",
	EMAIL_COPY = "";

}

?>
