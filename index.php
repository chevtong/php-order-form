<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

require 'products.php';

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";   
}
whatIsHappening();
   

$totalValue = 0;
$email = $zipcode = $street = $streetNum = $city = "";
$productChosen = "";
$deliveryAddress = $emailDisplay = "";
$emailWarning = $zipWarning = $productsWarning = "";



// if(isset($_GET["pastries"]) ) {

//     $products = [
//         ['name' => 'Cheese Cake', 'price' => 2,],
//         ['name' => 'Lemon Tart', 'price' => 2.3,],
//         ['name' => 'custard tart', 'price' => 4,],
//         ['name' => 'apple pie', 'price' => 6.5,],
//         ['name' => 'Tiramisu', 'price' => 5,],           
//     ];

// } else {

            // ['name' => 'sourdough loaf', 'price' => 2,],
        // ['name' => 'whole grain loaf', 'price' => 2.3,],
        // ['name' => 'brioche', 'price' => 4,],
        // ['name' => 'Bagel', 'price' => 2.5,],
        // ['name' => 'seeded loaf', 'price' => 6.5,], 
   // ];
//};


// $bread1 = new Product;
// $bread1->name = "sourdough loaf";
// $bread1->price = 2;

// $bread2 = new Product;
// $bread2->name = "whole grain loaf";
// $bread2->price = 2.4;

// $bread3 = new Product;
// $bread3->name = "brioche";
// $bread3->price = 5;

//$bread4 = new Product("Bagel", 3);


$products = [ 
    new Product("sourdough loaf", 2.8),
    new Product("whole grain loaf", 3.3),
    new Product("Bagel", 1.9),
    new Product("brioche", 4),
    new Product("seeded loaf", 3.5),
];








if(isset($_POST["order-now"])){

    //check if the street input is not empty, give the value to the session variable
    if(!empty($_POST["street"])){
        $_SESSION["street"] = $_POST["street"];
    }

    //check if the streetNumber input is not empty, give the value to the session variable
    if(!empty($_POST["streetnumber"])){
        $_SESSION["streetnumber"] = $_POST["streetnumber"];
    }

    //check if the city input is not empty, give the value to the session variable
    if(!empty($_POST["city"])){
        $_SESSION["city"] = $_POST["city"];
    }

    //check email is required
    if(empty($_POST["email"])){

        $emailWarning = "Email Is Required";
        $emailDisplay = "Email: <br>";

    } else {
        
        $email = $_POST["email"];
        $emailDisplay = "Email: ".$email."<br>";

        //check email in correct format
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

            $emailWarning = "Invalid email format";
            $emailDisplay = "Email: <br>";
        }
    }
    
    //check zipcode is required
    if(empty($_POST["zipcode"])){

        $zipWarning = "Zipcode Is Required";
        $deliveryAddress = "Delivery Address: <br>";

    } else {

        //check zipcode only in numbers
        if (!preg_match('/^\d+$/',$_POST["zipcode"])) {

            $zipWarning = "Only numbers allowed";
            $deliveryAddress = "Delivery Address: <br>";

        } else {   

            $deliveryAddress = "Delivery address: ". $_POST["streetnumber"].", ".$_POST["street"]. ", " . $_POST["city"]. ", " . $_POST["zipcode"];
            //give the value of zipcode input to the session variable
            $_SESSION["zipcode"] = $_POST["zipcode"];
        }
    }

    //check products is required
    if(empty($_POST["products"])){

        $productsWarning = "Products Is Required";

    } else {

        //show the totalValue     
        // foreach ($_POST['products'] as $i => $product) {
        // $totalValue += ($products[$i]->price);
        // }
    }
}

require 'form-view.php';