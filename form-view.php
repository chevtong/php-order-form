<?php // This files is mostly containing things for your view / html 
  
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Your fancy store</title>
    
<style>
    footer {
        text-align: center;
    }
    .warning{
        
        color: red;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Place your order</h1>
    <?php // Navigation for when you need it ?>
    <?php /*
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    */ ?>
    <form method="post" name="order-from">
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="required-info">* Required Information</div>
                <label for="email">E-mail *:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $email;?>"/>
                <div class="warning"> <?php echo $emailWarning; ?> </div> 


            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php print_r($_SESSION["street"]) ;?>" >
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php print_r($_SESSION["streetnumber"]);?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php print_r($_SESSION["city"]);?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php echo $zipcode;?>" >
                    <div class="warning"> <?php echo $zipWarning; ?></div>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products *</legend>
            <div class="warning"> <?php echo $productsWarning; ?></div>
            <?php foreach ($products as $i => $product): ?>
                <label>
					<?php // <?p= is equal to <?php echo ?>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?= number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <button type="submit" name="order-now" class="btn btn-primary">Order!</button>
    </form>

    <footer>
    <div class="order-product">

    <?php
    if(isset($_POST["order-now"])){
       
        if(empty($_POST["products"])){

            $productsWarning = "Products Is Required";

        } else {
            
            foreach($productChosen as $product){
            
            // show name of the product 
            echo $products[$product]["name"]." " ;
           
            }
        }
    }

    ?></div>
    You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks. <br>
           
            <?php echo $emailDisplay;?> 
            <?php echo $deliveryAddress;?>
            
    </footer>
</div>

</body>
</html>