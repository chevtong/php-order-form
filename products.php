<?php 


Class Product
{
    var $name;
    var $price;

    function __construct($name, $price)
    {
         $this->name = $name;
         $this->price = $price;
    }

    function displayName($name)
    {
        return $this->name;
    }

    function formattedPrice($price)
    {
        return number_format($this->price, 2);
    }

}




?>