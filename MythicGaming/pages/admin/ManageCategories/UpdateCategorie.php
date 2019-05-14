<?php
   
    require_once(dirname(__FILE__)."/../../../BL/product_categories.php");
    
    ?>

<?php

$product_categories = new product_categories();

$product_categories->id = $_GET['id'];

$product_categories->getById();



?>
<div class="Titulos">
   Update Categories
      <br/><br/><br/>
</div>
<div id="content">
    <form  id="criarprod" method="post">
        

        
        <label>Name: </label>
        <input style="width: 30%;" type="text" name="name" value="<?PHP echo $_POST['name'] = $product_categories->name; ?>" />
        <br/><br/><br/>

        

        <input class="button1" type="submit" value="Actualizar" name="update-product-categories"/>
        <br/><br/><br/>
    </form>
    
</div>
