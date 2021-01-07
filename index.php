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
whatIsHappening();
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

$email = $orderedProduct = "";
$deliveryAddress = "";
$productChosen ="";

$emailWarning = $zipWarning = $productsWarning = "";


if(isset($_POST["order-now"])){

    //check email is required
    if(empty($_POST["email"])){

        $emailWarning = "Email Is Required";

    } else {
        //check email in correct format
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

            $emailWarning = "Invalid email format";


        } else {

            $email = "email: ".$_POST["email"]."<br>";

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
        
    
    
    //check zipcode is required
    if(empty($_POST["zipcode"])){

        $zipWarning = "Zipcode Is Required";
        $deliveryAddress = "Please enter a valid address";

    } else {
        //check zipcode only in numbers
        if (!preg_match('/^\d+$/',$_POST["zipcode"])) {

            $zipWarning = "Only numbers allowed";
            $deliveryAddress = "Please enter a valid address";

        } else {

            $zipcode = $_POST["zipcode"];
            
            //display the address input
            $deliveryAddress = "delivery address: ". $_POST["streetnumber"].", ".$_POST["street"]. ", " . $_POST["city"]. ", " . $zipcode;
        }
        
    }

    // foreach ($_POST['products'] as $i => $product) {
    //     $orderedProduct += ($products[$i]['name']);
    // }
  


   
}

require 'form-view.php';