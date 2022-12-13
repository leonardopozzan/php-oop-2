<?php  
class PaymentCard{
    private string $number;
    private string $expireDate;

    function __construct(string $_number,string $_expireDate = 'yyyy-mm')
    {
        $this->setNumber($_number);
        $this->setExpireDate($_expireDate);
    }
    public function getNumber()
    {
        return $this->number;
    }
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }
    public function getExpireDate()
    {
        return $this->expireDate;
    }
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
        return $this;
    }
}
?>