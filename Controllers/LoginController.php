<?php

namespace Controllers;

    use DAO\Cinemas as Cinemas;
    use Models\Cinema as Cinema;
    class LoginController{

        private $users;

        public function Index()
        {
            require_once(VIEWS_PATH."login.php"); 
        }

       

    }
?>