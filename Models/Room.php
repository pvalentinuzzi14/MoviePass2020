<?php
namespace Models;
class Room {
    private $id;
    private $cinema;
    private $state;
    private $name;
    private $capacity;
    private $ticketPrice;

    public function __construct($cinema="",$name="",$capacity=" ",$ticketPrice=" ",$state=1) {
        $this->name = $name;
        $this->cinema = $cinema;
        $this->capacity = $capacity;
        $this->ticketPrice = $ticketPrice;
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

    public function getCapacity() {
        return $this->capacity;
    }

    public function setCapacity($capacity) {
        $return = 1;
        if($capacity > 0)
            $this->capacity = $capacity;
        else
            $return = 0;
        return $return;
    }

    public function getTicketPrice() {
        return $this->ticketPrice;
    }

    public function setTicketPrice($ticketPrice) {
        $return = 1;
        if($ticketPrice > 0)
            $this->ticketPrice = $ticketPrice;
        else
            $return = 0;
        return $return;
    }

    /**
     * Get the value of cinema
     */ 
    public function getCinema()
    {
        return $this->cinema;
    }

    /**
     * Set the value of cinema
     *
     * @return  self
     */ 
    public function setCinema($cinema)
    {
        $this->cinema = $cinema;

        return $this;
    }
}
?>