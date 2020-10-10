<?php
    namespace Models;

    class Cinema
    {
        private $name,$address,$id,$room;

        public function __construct($name="",$address="",$id=0,$room="")
        {
            $this->name = $name;
            $this->address = $address;
            $this->id = $id;
            $this->room = $room;
        }


        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of address
         */ 
        public function getAddress()
        {
                return $this->address;
        }

        /**
         * Set the value of address
         *
         * @return  self
         */ 
        public function setAddress($address)
        {
                $this->address = $address;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of room
         */ 
        public function getRoom()
        {
                return $this->room;
        }

        /**
         * Set the value of room
         *
         * @return  self
         */ 
        public function setRoom($room)
        {
                $this->room = $room;

                return $this;
        }
    }


?>