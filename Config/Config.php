<?php namespace Config;

defined("DS") ? null : define ("DS",DIRECTORY_SEPARATOR);

define("ROOT", dirname(__DIR__) .DS);

//Path to your project's root folder
define("FRONT_ROOT", "/MoviePass2020");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/styles/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("IMG_PATH", VIEWS_PATH . "img/");

?>




