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


Class Products
{
    var $name;
    var $price;

    function displayName()
    {
        return $this->name;
    }

    function displayPrice()
    {
        return $this->price;
    }

    function __construct($name, $price)
    {
        displayName() = $name;
        displayPrice() = $price;
    }
}




?>