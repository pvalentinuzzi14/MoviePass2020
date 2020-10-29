<?php
namespace Models;

class Genre{
    private $id,$name,$idBd;

    public function __construct()
    {
        
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
     * Get the value of idBd
     */ 
    public function getIdBd()
    {
        return $this->idBd;
    }

    /**
     * Set the value of idBd
     *
     * @return  self
     */ 
    public function setIdBd($idBd)
    {
        $this->idBd = $idBd;

        return $this;
    }
}

?>