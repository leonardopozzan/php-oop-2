<?php
include_once __DIR__ . '/Product.php';

class Food extends Product{
    private String $expirationDate;
    private Int|null $weight;
    private Array $ingredients;

    function __construct(String $_title, String $_image, Float $_price, Category $_category,Int $_weight, Array $_ingredients,String $_expirationDate = 'yyyy-mm-dd')
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
        $dateNow = new DateTime("now");
        $date = new DateTime($expirationDate);
        if($dateNow < $date){
            $this->expirationDate = $expirationDate;
        }else{
            $this->expirationDate = 'Scaduto';
        }
        return $this;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        if($weight > 0){
            $this->weight = $weight;
        }else{
            $this->weight = null;
        }
        return $this;
    }
    public function getIngredients()
    {
        return $this->ingredients;
    }
    public function setIngredients($ingredients)
    {
        if(count($ingredients)){
            $this->ingredients = $ingredients;
        }else{
            $this->ingredients = ["Unknown"];
        }
        return $this;
    }
}
?>