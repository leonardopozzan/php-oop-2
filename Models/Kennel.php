<?php
include_once __DIR__ . '/Product.php';

class Kennel extends Product{
    private String $size;
    private Int|null $weight;
    private Array $material;
    function __construct(String $_title, String $_image, Float $_price, Category $_category,String $_size,Int $_weight, Array $_material)
    {
        parent::__construct($_title, $_image, $_price, $_category);
        $this->setsize($_size);
        $this->setweight($_weight);
        $this->setmaterial($_material);
    }
    public function getsize()
    {
        return $this->size;
    }
    public function setsize($size)
    {
        if(strlen($size)){
            $this->size = $size;
        }else{
            $this->size = "0x0cm";
        }
        return $this;
    }
    public function getweight()
    {
        return $this->weight;
    }
    public function setweight($weight)
    {
        if($weight > 0){
            $this->weight = $weight;
        }else{
            $this->weight = null;
        }
        return $this;
    }
    public function getmaterial()
    {
        return $this->material;
    }
    public function setmaterial($material)
    {
        if(count($material)){
            $this->material = $material;
        }else{
            $this->material = ["Unknown"];
        }
        return $this;
    }
}
?>