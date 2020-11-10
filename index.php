<?php
    /**
    * index.php is the starting point of the application
    */

    /**
    * Default timezone (change according to the zone)
    */
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	/**
	* To show errors
	*/
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    /**
	* Upload of required files
	*/
    require "Config/Autoload.php";
    require "Config/Config.php";

    /**
	* Alias
	*/
    use Config\Autoload as Autoload;
    use Config\Router as Router;
    use Config\Request as Request;

    /**
	* Starting autoload ..
	*/
    Autoload::start();


    /**
	* Starting session ..
	*/
    session_start();
	
	require_once(VIEWS_PATH."header.php");
	
	Router::Route(new Request());

	require_once(VIEWS_PATH."footer.php");
?>

