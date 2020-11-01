<?php

namespace Controllers;

    use DAO\Users as Users;
    use DAO\UsersRole as UsersRole;
    class LoginController{

        private $usersDao;
        private $usersRoleDao;

        public function __construct()
        {
            $this->usersDao = new Users();
            $this->usersRoleDao = new UsersRole();
        }

        public function Index()
        {
            require_once(VIEWS_PATH."login.php"); 
        }

    }
?>