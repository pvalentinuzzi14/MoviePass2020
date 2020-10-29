<?php
namespace Models;

class Movie
{
    private $title;
    private $vote_average;
    private $overview;
    private $release_date;
    private $genre_ids;
    private $id;
    private $image;
    private $background;
    private $idBd;
    private $score;


    public function __construct()   
    {
        $this->genre_ids=array();
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of vote_average
     */ 
    public function getVote_average()
    {
        return $this->vote_average;
    }

    /**
     * Set the value of vote_average
     *
     * @return  self
     */ 
    public function setVote_average($vote_average)
    {
        $this->vote_average = $vote_average;

        return $this;
    }

    /**
     * Get the value of overview
     */ 
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Set the value of overview
     *
     * @return  self
     */ 
    public function setOverview($overview)
    {
        $this->overview = $overview;

        return $this;
    }

    /**
     * Get the value of release_date
     */ 
    public function getRelease_date()
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     *
     * @return  self
     */ 
    public function setRelease_date($release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * Get the value of genre_ids
     */ 
    public function getGenre_ids()
    {
        return $this->genre_ids;
    }

    /**
     * Set the value of genre_ids
     *
     * @return  self
     */ 
    public function setGenre_ids($genre_ids)
    {
        $this->genre_ids = $genre_ids;

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
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of background
     */ 
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set the value of background
     *
     * @return  self
     */ 
    public function setBackground($background)
    {
        $this->background = $background;

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

    /**
     * Get the value of score
     */ 
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @return  self
     */ 
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }
}

?>