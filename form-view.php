<?php // This files is mostly containing things for your view / html 

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="style/favicon.png">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
        rel="stylesheet" />

    <link rel="stylesheet" href="style/style.css">
    <title>Carb</title>


</head>

<body>

    <div class="background"></div>

    <div class="container pt-5">
        <h1 class="text-capitalize font-weight-bold">Place your order</h1>

                
    
        
        <?php //To show the selected products: use isset when the isset($_POST["products"]) to confirm it is set
        if(isset($_POST["products"]) && !empty($_POST["products"])){ 
        // take out the keys of the array to refer to the products array to grab the name of the product(s)
        //it give back an array with the keys, then use a foreach in form-view.php to grab the name
        //var_dump($productChosen);
        $productChosen = array_keys($_POST['products']);?>

        <div class="order-confirmation">
            <div class="order-product ">
                <span class="choice text-capitalize font-weight-normal font-italic">your choice: <br></span>

                <?php //use foreach to loop thru the array
                foreach ($productChosen as $bread) { ?>

                <p class="text-uppercase font-weight-bold my-0">

                <?php echo $products[$bread]->name; //use the array[index]to get the name ?>
                </p>
                <?php };?>
            </div>
        You already ordered <strong>&euro; <?php echo $totalValueTwoDigits ?></strong> in Crab &#174; <br>
        <div class="email-display pt-1 "> <?php echo $emailDisplay;?> </div>
        <div class="address-display pt-1 pb-1"><?php echo $deliveryAddress;?></div>
        
        </div>
        <?php }; ?>

        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-warning text-uppercase active" href="?bread"> food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-warning text-uppercase" href="?pastries"> pastries</a>
                </li>
            </ul>
        </nav>



        <form method="post" name="order-from">
            <div class="form-row">
                <div class="form-group col-md-6 pt-3 pb-3">
                    <div class="required-info font-weight-light pb-2">* Required Information</div>
                    <label for="email">E-mail* :</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo $email;?>" />
                    <div class="warning"> <?php echo $emailWarning; ?> </div>
                </div>
            </div>

            <fieldset>
                <legend class="font-weight-bold">Address</legend>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" class="form-control" value="<?php 
                    if(isset($_SESSION["street"])){ echo $_SESSION["street"]; }?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="streetnumber" class="text-capitalize">Street number:</label>
                        <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php 
                      if(isset($_SESSION["streetnumber"])){ echo $_SESSION["streetnumber"];}?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" class="form-control" value="<?php 
                     if(isset($_SESSION["city"])){ echo $_SESSION["city"]; } ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zipcode:</label>
                        <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php 
                    if(isset($_SESSION["zipcode"])){ echo $_SESSION["zipcode"];} ?>">
                        <div class="warning"> <?php echo $zipWarning; ?></div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend class="font-weight-bold">Products*</legend>
                <div class="warning"> <?php echo $productsWarning; ?></div>
                <?php foreach ($products as $i => $product): ?>
                <label class="products text-uppercase font-weight-bold p-1">
                    <?php // <?p= is equal to <?php echo ?>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]" />
                    <?php echo $product->displayName($product->name); ?>
                    &euro; <?= $product->formattedPrice($product->price); ?></label><br />
                <?php endforeach; ?>
            </fieldset>

            <button type="submit" name="order-now"
                class="btn btn-outline-warning btn-lg text-uppercase mt-3">Order!</button>
        </form>

        <footer>

        </footer>
    </div>

</body>

</html>