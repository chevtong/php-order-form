<?php


// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);


// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
//whatIsHappening();

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'drink', 'price' => 2.5,],
    ['name' => 'choclate', 'price' => 1.5,],
    ['name' => 'coffee', 'price' => 4,],
    ['name' => 'food', 'price' => 2.5,],
    ['name' => 'cake', 'price' => 6.5,],
    ['name' => 'ice cream', 'price' => 8,],
];

$totalValue = 0;

$email = $zipcode = $street = $streetNum = $city = "";
$orderedProduct = $productChosen = "";
$deliveryAddress = $emailDisplay = "";
$emailWarning = $zipWarning = $productsWarning = "";


if(isset($_POST["order-now"])){

    $street = $_POST["street"];
    $streetNum = $_POST["streetnumber"];
    $city = $_POST["city"];

    //check email is required
    if(empty($_POST["email"])){

        $emailWarning = "Email Is Required";
        $emailDisplay = "email: <br>";

    } else {
        
        $email = $_POST["email"];
        $emailDisplay = "email: ".$email."<br>";

        //check email in correct format
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

            $emailWarning = "Invalid email format";
            $emailDisplay = "email: <br>";

        }
    }
    

    //TODO: delivery address is empty if missing zipcode
    //check zipcode is required
    if(empty($_POST["zipcode"])){

        $zipWarning = "Zipcode Is Required";
        $deliveryAddress = "Delivery Address: <br>";

    } else {

        $zipcode = $_POST["zipcode"];
        $deliveryAddress = "delivery address: ". $_POST["streetnumber"].", ".$_POST["street"]. ", " . $_POST["city"]. ", " . $zipcode;
        
        //check zipcode only in numbers
        if (!preg_match('/^\d+$/',$_POST["zipcode"])) {

            $zipWarning = "Only numbers allowed";
            $deliveryAddress = "Delivery Address: <br>";
        }    
    }

    //check products is required
    if(empty($_POST["products"])){

        $productsWarning = "Products Is Required";

    } else {
        $orderedProduct = $_POST['products'];
        $productChosen = array_keys($orderedProduct);
     
         //show the totalValue     
        foreach ($orderedProduct as $i => $product) {
        $totalValue += ($products[$i]['price']);
        }

    }

}

require 'form-view.php';