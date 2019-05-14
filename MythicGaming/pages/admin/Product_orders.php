<?php
   require_once(dirname(__FILE__)."/../../BL/product_orders.php"); 

    $product_orders= product_orders::getSome();
   



?>

<table class="financas">
    
    <tr>
       
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
      
     
    </tr>
    
    <?php
        while($c = $product_orders->fetch()) {
            ?>
    <tr>
      <?php
            echo "<td>{$c->id}</td>";
            echo "<td>{$c->name}</td>";
            echo "<td>{$c->price}</td>";
            echo "<td>{$c->quantity}</td>";
          
            
     
      


            echo '<td>';
            echo '<a href="index.php?page=admin/Product_orders&action=delete-product_orders&id='.$c->id.'">Delete</a>';
            echo"<td>";
            echo '<a href="index.php?page=/admin/ManageProduct_Orders/UpdateProduct_Orders.php&id='.$c->id.'">update</a>';
            echo '</td>';
            ?>
    </tr>
    <?php
        
     
}
        ?>
</table>

