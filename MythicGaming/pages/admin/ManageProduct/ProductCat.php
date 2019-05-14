<?php
      require_once(dirname(__FILE__)."/../../../BL/product.php"); 
      require_once(dirname(__FILE__)."/../../../BL/product_categories.php"); 
   
    $product = product::ProductCat();
       $product_categories= product_categories::getAll();
   
?>

<?php
    


?>

<table class="financas">
    
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Name</th>
      
    <br>
       
    </tr>
    
    <?php
        while($p = $product->fetch()) {
            ?>
    <tr>
        <?php
           
              echo "<td>{$p->id}</td>"; 
            echo "<td>{$p->NameProduct}</td>";
            echo "<td>{$p->name}</td>";
           

       ?>
    </tr>
    <?php
        }
        $product->closeCursor();

        ?>
</table>
 <?php