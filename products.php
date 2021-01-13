<?php 

// $products = [
//         ['name' => 'Cheese Cake', 'price' => 2,],
//         ['name' => 'Lemon Tart', 'price' => 2.3,],
//         ['name' => 'custard tart', 'price' => 4,],
//         ['name' => 'apple pie', 'price' => 6.5,],
//         ['name' => 'Tiramisu', 'price' => 5,],           
//     ];

// ['name' => 'sourdough loaf', 'price' => 2,],
//         ['name' => 'whole grain loaf', 'price' => 2.3,],
//         ['name' => 'brioche', 'price' => 4,],
//         ['name' => 'Bagel', 'price' => 2.5,],
//         ['name' => 'seeded loaf', 'price' => 6.5,], 


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