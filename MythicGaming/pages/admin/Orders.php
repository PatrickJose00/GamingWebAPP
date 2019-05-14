
<?php
   require_once(dirname(__FILE__)."/../../BL/orders.php"); 
   require_once(dirname(__FILE__)."/../../BL/customer.php"); 


   
   

     $orders= orders::getALL();
     $customer= customer::getname();

 



   
?>

<?php
    


?>


  

<div style="position:absolute; margin-left: 30px; margin-top: 50px;">
    <table>
        <tr>
<a style= "" href="index.php?page=admin/ManageOrders/OrdersList&action"  id="button1">Lista de Encomendas/Cliente</a>
</tr>
    </table>


 
<table class="financas">
    
    
    <tr>
            
        <th>Nome</th>
        <th>Estado</th>
        <th>Tipo Pagamento</th>
        <th>Quantidade</th>
        <th>Transporte</th>
        <th>Data</th>
    </tr>

    
   
    <?php
   
    
  
    
        while($p = $orders->fetch() and $c = $customer->fetch()) {
            ?>
    
     
    <tr>
        
       
        <?php
         
         
            echo "<td>{$c->name}</td>"; 
    
            echo "<td>{$p->status}</td>";
            echo "<td>{$p->payment}</td>";
            echo "<td>{$p->quantity}</td>";
            echo "<td>{$p->transport}</td>";
             echo "<td>{$p->date}</td>";
           
          
         
            
        
      
//             echo '<td>';
//            echo '<a href="index.php?page=admin/ManageOrders/CreateOrders&action=criar-encomenda&id='.$p->id.'">Create</a>';
            echo '<td>';
            echo '<a href="index.php?page=admin/Orders&action=delete-orders&id='.$p->id.'">Delete</a>';
          echo"<td>";
             echo '<a href="index.php?page=/admin/ManageOrders/UpdateOrders.php&id='.$p->id.'">update</a>';
            echo '</td>';
            ?>
        
     
    </tr>
  
    
    
    <?php
        
        }  
//}
              
        ?>
  
</table>

