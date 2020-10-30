<?php
namespace Models;
class Cinema {
    private $id;
    private $state;
    private $name;
    private $address;
    private $openingTime;
    private $closingTime;
    private $rooms;

    public function __construct($name="",$address="",$openingTime="",$closingTime="",$rooms="",$state=1) {
        $this->name = $name;
        $this->address = $address;
        $this->openingTime = $openingTime;
        $this->closingTime = $closingTime;
        $this->rooms = $rooms;
        $this->state = $state;

    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function getAddress() {
        return $this->address;
    }
 
    public function setAddress($address) {
        $this->address = $address;
    }

    public function getOpeningTime() {
        return $this->openingTime;
    }

    public function setOpeningTime($openingTime) {
        $this->openingTime = $openingTime;
    }

    public function getClosingTime() {
        return $this->closingTime;
    }

    public function setClosingTime($closingTime) {
        $return = 1;
        if($closingTime != "00:00")
            $this->closingTime = $closingTime;
        else
            $return = 0;
        return $return;
    }

    public function getRooms()
    {
        return $this->rooms;
    }

    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }
}
?>