<?php  
include_once __DIR__ . '/PaymentCard.php';
include_once __DIR__ . '/User.php';
class PremiumUser extends User{
    private string $email;
    private string $password;
    private static float $discount = 0.2;
    private PaymentCard $paymentCard;
    private bool $validPayment;
    function __construct(string $_email,string $_password, PaymentCard $_paymentCard)
    {
        $this->setEmail($_email);
        $this->setPassword($_password);
        $this->paymentCard = $_paymentCard;
        $this->setValidPayment($_paymentCard->getExpireDate());
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
    public function getValidPayment()
    {
        return $this->validPayment;
    }
    public function setValidPayment($expireDate)
    {
        $dateNow = new DateTime("now");
        $date = new DateTime($expireDate);
        if($dateNow < $date){
            $this->validPayment = true;
        }else{
            $this->validPayment = false;
        }
        return $this;
    }
}
?>