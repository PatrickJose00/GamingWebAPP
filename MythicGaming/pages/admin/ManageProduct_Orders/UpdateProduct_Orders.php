<?php
   
    require_once(dirname(__FILE__)."/../../../BL/product_orders.php");
    
    ?>
<?php

$product_orders = new product_orders();

$product_orders->id = $_GET['id'];

$product_orders->getById();



?>
<div class="Titulos">
   Update Product_orders
      <br/><br/><br/>
</div>
<div id="content">
    <form id="criarprod" method="post">


        
        
        <label>Price: </label>
        <input style="width: 30%;" type="text" name="price" value="<?PHP echo $_POST['price'] = $product_orders->price; ?>" />
        <br/><br/><br/>

        <label>Quantity: </label>
        <input style="width: 30%;" type="text" name="quantity"  value="<?PHP echo $_POST['quantity'] = $product_orders->quantity; ?>"/>
        <br/><br/><br/>
      
     
    




        <input type="submit" value="Actualizar" name="update-product_orders"/>
        <br/><br/><br/>
    </form>
    
</div>


