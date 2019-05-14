<?php
      require_once(dirname(__FILE__)."/../../../BL/product_orders.php"); 
    require_once(dirname(__FILE__)."/../../../BL/orders.php");
     require_once(dirname(__FILE__)."/../../../BL/customer.php");
    
    $orders = orders::encomendas();
    
    
   
?>



<table class="financas">
    
    <tr>
       
        <th>ID</th>
        <th>Name</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
      
       
     
    </tr>
    
    <?php
        while($p = $orders->fetch()) {
            ?>
    <tr>
        <?php
            echo "<td>{$p->id}</td>";
            echo "<td>{$p->CustomerName}</td>";
           echo "<td>{$p->name}</td>";
            echo "<td>{$p->price}</td>";
            echo "<td>{$p->quantity}</td>";
             
            
          
      

       ?>
    </tr>
    <?php
        }
        $orders->closeCursor();

        ?>
</table>

