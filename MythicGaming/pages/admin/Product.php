<?php
    require_once(dirname(__FILE__)."/../../BL/product.php"); 
  
    $product = product::getAll();
   
?>

<?php
    


?>
<div style="position:absolute; margin-left: 30px; margin-top: 50px;">
    <table>
        <tr>
<a style= "" href="index.php?page=admin/ManageProduct/ProductCat&action"  id="button1">Categorias dos Produtos</a>
</tr>
 <tr>
<a style="margin-left: 20px;" href="index.php?page=admin/ManageProduct/CreateProduct&action=criar-produto" id="button1">Novo Produto</a>

</tr>
    </table>
    <table>
</div>
<table class="financas">
    
    <tr>
       
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Stock</th>
        <th>Descrição</th>    
       
     
    </tr>
    
    <?php
        while($p = $product->fetch()) {
            ?>
    <tr>
        <?php
            echo "<td>{$p->id}</td>";
            echo "<td>{$p->name}</td>";
            echo "<td>{$p->price}</td>";
            echo "<td>{$p->stock}</td>";
            echo "<td>{$p->description}</td>";
        
      

             echo '<td>';
            echo '<a href="index.php?page=admin/Product&action=delete-product&id='.$p->id.'">Delete</a>';
           echo"<td>";
            echo '<a href="index.php?page=/admin/ManageProduct/UpdateProduct.php&id='.$p->id.'">update</a>';
            echo '</td>';
        ?>
    </tr>
   <?php
        
        }  

              
        ?>
  
     
</table>

