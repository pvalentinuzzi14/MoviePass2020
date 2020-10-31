<?php

namespace Controllers;

    use DAO\Showtimes as D_showtime;
    use Models\Showtime as M_showtime;
    class ShowtimeController{

        private $showtime;

        public function __construct()
        {
            $this->showtime = new D_showtime();
        }

        public function add($name,$address,$openingTime="",$closingTime="")
        {
            $cinema = new M_showtime($name,$address,$openingTime,$closingTime);
          //  $this->showtime->add($cinema);

        $adminController = new AdminController();
        $adminController->Index();
        }      

        public function remove($id)
        {
          //  $this->showtime->remove($id);
            $adminController = new AdminController();
            $adminController->Index();
        }


        public function showAddView(){
            require_once(VIEWS_PATH."addshowtime.php");
        }

        

        
    }
?>