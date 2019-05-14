<?php
    require_once(dirname(__FILE__)."/../../BL/product_categories.php"); 
  

      $product_categories= product_categories::getALL();
    
   
?>

<?php
    


?>
<div style="position:absolute; margin-left: 30px; margin-top: 50px;">
     <table>
        <tr>
<a  href="index.php?page=admin/ManageCategories/CreateCategorie" id="button1">Nova Categoria</a>
</tr>
     </table>

<table class="financas">
    
    <tr>
       
        <th>ID</th>
        <th>Nome</th>
        
        
     
    </tr>
    
    <?php
        while($p = $product_categories->fetch()) {
            ?>
    <tr>
        <?php
            echo "<td>{$p->id}</td>";
            echo "<td>{$p->name}</td>";
          
      

            echo '<td>';
            echo '<a href="index.php?page=admin/Product_categories&action=delete-product-categories&id='.$p->id.'">Delete</a>';
           echo"<td>";
            echo '<a href="index.php?page=/admin/ManageCategories/UpdateCategorie.php&id='.$p->id.'">update</a>';
            echo '</td>';
        ?>
    </tr>
   <?php
        
        }  
//}
              
        ?>
  
     
</table>

