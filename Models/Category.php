<?php 

class Category{
    private String $species;

    function __construct(String $_species)
    {
        $this->setSpecies($_species);
    }

    public function getSpecies()
    {
        return $this->species;
    }
    public function setSpecies($species)
    {
        $this->species = $species;
        return $this;
    }
}
?>