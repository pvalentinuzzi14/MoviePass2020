<?php

namespace Controllers;

    use DAO\Users as D_user;
    use DAO\UsersRole as D_usersRole;
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

        public function Update(){
            $user=$this->usersDao->retrieveOne($_SESSION['userID']);
            require_once(VIEWS_PATH."/updateProfile.php"); 
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
                $user = $this->usersDao->retrieveOne($flag[0]['idUsers']);
                $_SESSION['userID']=$flag[0]['idUsers'];
                $_SESSION['userName']=$user->getFirstName();
                $_SESSION['userRole']=$user->getUserRole()->getId();
                if($user->getUserRole()->getId()==1){
                    header("location:../Admin/index");
                }else{
                    header("location:../Home/index");
                }
               
            }
        }

        public function logout(){
            session_destroy();
            header("location:../index.php");
        }

        public function changeProfile($firstName,$lastName){
            $this->usersDao->updateFirstName($_SESSION['userID'],$firstName);
            $this->usersDao->updateLastName($_SESSION['userID'],$lastName);
            $_SESSION['userName']=$firstName;
            $this->Update();
        }

    }
?>