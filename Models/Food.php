<?php
include_once __DIR__ . '/Product.php';

class Food extends Product{
    private String $expirationDate;
    private Int $weight;
    private Array $ingredients;

    function __construct(String $_title, String $_image, Float $_price, Category $_category,String $_expirationDate,Int $_weight, Array $_ingredients)
    {
        parent::__construct($_title, $_image, $_price, $_category);
        $this->setExpirationDate($_expirationDate);
        $this->setWeight($_weight);
        $this->setIngredients($_ingredients);
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }
    public function getIngredients()
    {
        return $this->ingredients;
    }
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
        return $this;
    }
}
?>