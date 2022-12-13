<?php
include_once __DIR__ . '/Category.php';
class Product {
    protected String $title;
    protected String $image;
    protected Float $price;
    public Category $category;

    function __construct(String $_title, String $_image, Float $_price, Category $_category)
    {
        $this->setTitle($_title);
        $this->setImage($_image);
        $this->setPrice($_price);
        $this->category = $_category;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
}

?>