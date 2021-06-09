<?php

use app\models\Route;

echo template('404.html', array(
    "RAIZ" => Route::get_Raiz()
));
?>