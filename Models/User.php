<?php 
class User{
    private array $cart = [];

    public function getCart()
    {
        return $this->cart;
    }

    public function addToCart(String $product)
    {
        array_push($this->cart, $product);
    }
}
?>