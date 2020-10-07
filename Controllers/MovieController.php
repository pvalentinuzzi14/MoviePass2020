<?php

namespace Controllers;

    class MovieController
    {
        public function getAll($message = "")
        {
         $jsonAll = json_decode(file_get_contents("https://api.themoviedb.org/3/discover/movie?api_key=2f0f4f905a5085a4cb6411b8c639165b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1"),true);
         require_once(VIEWS_PATH."cinemas.php");
        }        
    }
?>