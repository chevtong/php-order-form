<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

//require the product class
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
//whatIsHappening();
   
$totalValue = $totalValueTwoDigits = 0;
$email = $zipcode = $street = $streetNum = $city = "";
$productChosen = "";
$deliveryAddress = $emailDisplay = "";
$emailWarning = $zipWarning = $productsWarning = "";

if(isset($_GET["pastries"]) ) {

    $products = [ 
        new Product("cheese cake", 8.8),
        new Product("Lemon tart", 10),
        new Product("custard tart", 6.8),
        new Product("apple pie", 7),
        new Product("Liege waffle", 2.5),
    ];

} else {

    $products = [ 
        new Product("sourdough loaf", 2.8),
        new Product("whole grain loaf", 3.3),
        new Product("Bagel", 1.9),
        new Product("brioche", 4),
        new Product("seeded loaf", 3.5),
    ];  
};


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
        foreach ($_POST['products'] as $i => $product) {
        $totalValue += $products[$i]->price;
        $totalValueTwoDigits = number_format($totalValue, 2);
        }
    }
}

require 'form-view.php';