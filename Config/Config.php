<?php namespace Config;

defined("DS") ? null : define ("DS",DIRECTORY_SEPARATOR);

define("ROOT", dirname(__DIR__) .DS);

//Path to your project's root folder
define("FRONT_ROOT", "/MoviePass2020");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/styles/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("IMG_PATH", VIEWS_PATH . "img/");

defined("API_KEY") ? null : define ("API_KEY",'2f0f4f905a5085a4cb6411b8c639165b');

define("DB_HOST", "localhost");
define("DB_NAME", "moviepass");
define("DB_USER", "root");
define("DB_PASS", "");


?>




