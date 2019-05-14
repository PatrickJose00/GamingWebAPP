<!DOCTYPE html>
<?php
    require_once(dirname(__FILE__) . "/Controller/controller.php");

    $msg = Controller::process();
?>
<html>
    <head>
        <title>Desenvolvimento Web</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public_html/img/favicon.ico" rel="icon" type="image/x-icon" />
        <link href="public_html/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>
    </head>
    <body>
        <div class="welcome">
         <?php 
        
        $user = UserController::getLoggedUser();        
        if($user) {            
            echo "Wellcome, $user->login!";
        } else {
            echo "No user";
        }
        
      
       
        
        
        ?>
        </div>

        <header>
            <div id="header" class="center">
                <?php
                require_once(dirname(__FILE__) . "/pages/menu.php");
                ?>
                <div id="cart">
                    <a href="index.php?page=cart.php"><img src="public_html/img/cart.png" title="Adicionar ao Carrinho" alt="Adicionar ao Carrinho" id="cart-img"/></a>
                </div>
                <div id="logo">
                    <a href="index.php"><img src="public_html/img/logo.png" alt="Mythic Gaming" title="Mythic Gaming" id="logo-img"/></a>
                    <a href="index.php"><img src="public_html/img/logo-text.png" alt="Mythic Gaming" title="Mythic Gaming" id="logo-text"/></a>
                </div>
                <div class="clear"></div>
            </div>
        </header>
        <div id="wrapper" class="center">
            <div class="content" id="container">
                <?php
                    require_once(dirname(__FILE__) . "/pages/content.php");
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('img.img-product-individual').each(function() {
                    var maxWidth = 450; // Max width for the image
                    var maxHeight = 300;    // Max height for the image
                    var ratio = 0;  // Used for aspect ratio
                    var width = $(this).width();    // Current image width
                    var height = $(this).height();  // Current image height

                    // Check if the current width is larger than the max
                    if(width > maxWidth){
                        ratio = maxWidth / width;   // get ratio for scaling image
                        $(this).css("width", maxWidth); // Set new width
                        $(this).css("height", height * ratio);  // Scale height based on ratio
                        height = height * ratio;    // Reset height to match scaled image
                        width = width * ratio;    // Reset width to match scaled image
                    }

                    // Check if current height is larger than max
                    if(height > maxHeight){
                        ratio = maxHeight / height; // get ratio for scaling image
                        $(this).css("height", maxHeight);   // Set new height
                        $(this).css("width", width * ratio);    // Scale width based on ratio
                        width = width * ratio;    // Reset width to match scaled image
                        height = height * ratio;    // Reset height to match scaled image
                    }
                });
            });
            
        </script>
    </body>
</html>