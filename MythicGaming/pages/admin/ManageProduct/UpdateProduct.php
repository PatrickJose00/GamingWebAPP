<?php
   
    require_once(dirname(__FILE__)."/../../../BL/product.php");
    
    ?>
<?php

$product = new product();

$product->id = $_GET['id'];

$product->getByIdd();



?>
<div class="Titulos">
   Update Product
      <br/><br/><br/>
</div>
<div id="content">
    <form id="criarprod"  method="post">


        
        
        <label>Name: </label>
        <input style="width: 30%;" type="text" name="name" value="<?PHP echo $_POST['name'] = $product->name; ?>" />
        <br/><br/><br/>

        <label>Description: </label>
        <input  style="width: 30%;"type="text" name="description"  value="<?PHP echo $_POST['description'] = $product->description; ?>"/>
        <br/><br/><br/>
      
        <label>Price: </label>
        <input style="width: 30%;" type="number" name="price" value="<?PHP echo $_POST['price'] = $product->price ?>" />
        <br/><br/><br/>
        
        <label>Stock: </label>
        <input style="width: 30%;" type="number" name="stock" value="<?PHP echo $_POST['stock'] = $product->stock ?>" />
        <br/><br/><br/>




        <input type="submit" value="Actualizar" name="update-product"/>
        <br/><br/><br/>
    </form>
    
</div>



       