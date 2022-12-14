<?php
include_once __DIR__ . '/Product.php';
include_once __DIR__ . '/../Traits/Size.php';
class Kennel extends Product{
    use Size;
    private Int|null $weight;
    private Array $material;
    function __construct(string $_title, string $_image, float $_price, Category $_category, int $_weight, array $_material)
    {
        parent::__construct($_title, $_image, $_price, $_category);
        $this->setweight($_weight);
        $this->setmaterial($_material);
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