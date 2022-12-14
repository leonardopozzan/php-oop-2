<?php
include_once __DIR__ . '/Category.php';
class Product {
    protected String $title;
    protected String $image;
    protected Float $price;
    public Category $category;
    private bool $avaliable;
    function __construct(String $_title, String $_image = null, Float $_price, Category $_category)
    {
        $this->setTitle($_title);
        $this->setImage($_image);
        $this->setPrice($_price);
        $this->category = $_category;
        $this->setAvaliable($_price);
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        if(strlen($title)){
            $this->title = $title;
        }else{
            $this->title = null;
        }
        return $this;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        if(strlen($image)){
            $this->image = $image;
        }else{
            $this->image = 'default.jpg';
        }
        return $this;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        if($price > 0){
            $this->price = $price;
        }else{
            $this->price = abs($price);
        }
        return $this;
    }
    public function getAvaliable()
    {
        return $this->avaliable;
    }
    private function setAvaliable($price)
    {
        if($price <= 0){
            $this->avaliable = false;
        }else{
            $this->avaliable = true;
        }
        return $this;
    }
}

?>