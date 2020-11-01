<?php

namespace Controllers;

    use DAO\Users as D_user;
    use DAO\UsersRole as D_usersRole;
    use Controllers\AdminController as AdminCont;
    use Controllers\HomeController as Home;
    use Models\User as M_user;
    class UserController{

        private $usersDao;
        private $usersRoleDao;

        public function __construct()
        {
            $this->usersDao = new D_user();
            $this->usersRoleDao = new D_usersRole();
        }

        public function Index()
        {
            require_once(VIEWS_PATH."/login.php"); 
        }

        public function Register()
        {
            require_once(VIEWS_PATH."/register.php"); 
        }

        public function add($email,$password,$firstName,$lastName)
        {
            $user = new M_user();
            $userRoleArray = $this->usersRoleDao->retrieveAll();
            $flag = $this->usersDao->checkUserList();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            if($flag == 0){
                $user->setUserRole($userRoleArray[0]);
            }else{
                $user->setUserRole($userRoleArray[1]);
            }
            $this->usersDao->create($user);
            
            require_once(VIEWS_PATH."/login.php");
        }

        public function login($userName, $password)
        {
            $flag = $this->usersDao->checkUserToLogin($userName,$password);
            if($flag!=null){
                $_SESSION['userID']=$flag[0]['idUsers'];
                $_SESSION['userName']=$flag[0]['email'];
                $admin = new AdminCont();
                $admin->Index();
            }
        }

        public function logout(){
            session_destroy();
            $home = new Home();
            $home->Index();
        }

    }
?>