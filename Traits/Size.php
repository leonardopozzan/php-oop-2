<?php  
trait Size{
    protected string $size;
    public function getsize()
    {
        return $this->size;
    }
    public function setsize($size)
    {
        if(strlen($size)){
            $this->size = $size;
        }else{
            $this->size = "Piccolo";
        }
        return $this;
    }
}
?>