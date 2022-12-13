<?php  
include_once __DIR__ . '/PaymentCard.php';
class User{
    private string $email;
    private string $password;
    private static float $discount = 0.2;
    private PaymentCard $paymentCard;
    function __construct(string $_email,string $_password, PaymentCard $_paymentCard)
    {
        $this->setEmail($_email);
        $this->setPassword($_password);
        $this->paymentCard = $_paymentCard;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    public function getDiscount()
    {
        return $this->discount;
    }
    public function getPaymentCard()
    {
        return $this->paymentCard;
    }
    public function setPaymentCard(PaymentCard $paymentCard)
    {
        $this->paymentCard = $paymentCard;
        return $this;
    }
}
?>