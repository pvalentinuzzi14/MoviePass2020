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

    public function __construct($title="",$vote_average="",$overview="",$release_date="",$genre_ids="",$id="",$image="")   
    {
        $this->setTitle($title);
        $this->setVote_average($vote_average);
        $this->setOverview($overview);
        $this->setRelease_date($release_date);
        $this->setGenre_ids($genre_ids);
        $this->setId($id);
        $this->setImage($image);
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
}

?>