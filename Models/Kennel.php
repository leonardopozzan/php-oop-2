<?php
include_once __DIR__ . '/Product.php';

class Kennel extends Product{
    private String $size;
    private Int $weight;
    private Array $material;
    function __construct(String $_title, String $_image, Float $_price, Category $_category,String $_size,Int $_removable, Array $_material)
    {
        parent::__construct($_title, $_image, $_price, $_category);
        $this->setsize($_size);
        $this->setremovable($_removable);
        $this->setmaterial($_material);
    }

    public function getsize()
    {
        return $this->size;
    }

    public function setsize($size)
    {
        $this->size = $size;
        return $this;
    }
    public function getremovable()
    {
        return $this->weight;
    }
    public function setremovable($weight)
    {
        $this->weight = $weight;
        return $this;
    }
    public function getmaterial()
    {
        return $this->material;
    }
    public function setmaterial($material)
    {
        $this->material = $material;
        return $this;
    }
}
?>