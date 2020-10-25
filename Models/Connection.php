<?php
namespace Models;

use Exception;
use PDO;

class Connection
    {
        private $connectionDb;

        public function __construct()
        {
            
        }
        public function getConnection()
        {
            try{
                $this->connectionDb = new PDO('mysql:host=localhost; dbname=moviepass','root','');

                $this->connectionDb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $this->connectionDb->exec("SET CHARACTER SET utf8");

                return $this->connectionDb;

            }catch(Exception $e){
                echo "La linea de error es:" . $e->getLine();
            }
        }
        public function getConnectionDb()
        {
            return $this->connectionDb;
        }
        public function setConnectionDb($variable)
        {
             $this->connectionDb = $variable;
        }
    }
?>
