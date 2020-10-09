<?php

namespace Controllers;

use DAO\MoviesDAO as MoviesDAO;

    class MovieController
    {
        public function getAll($message = "")
        {
            $movieDAO = new MoviesDAO();
            $json = $movieDAO->getAll();
            require_once(VIEWS_PATH."movies.php");
        }   
        
        public function refreshData()
        {
            $movieDAO = new MoviesDAO();
            $movieDAO->refreshData();
            require_once(VIEWS_PATH."index.php");
        }
    }
?>