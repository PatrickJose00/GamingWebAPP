

<?php
     
    require_once(dirname(__FILE__)."/../../BL/orders.php");
    $orders = orders::getAll();
   
?>

<?php
    
if(UserController::isLoggedUserAdmin()) {

?>

<table class="financas">
    
    <tr>
        <th>ID</th>
        
        <th>Data</th>
        <th>Estado</th>
        <th>Transporte</th>
        <th>Tipo Pagamento</th>
         <th>Actions</th>
    </tr>
    
    <?php
        while($p = $orders->fetch()) {
            ?>
    <tr>
        <?php
            echo "<td>{$p->id}</td>";
            echo "<td>{$p->date}</td>";
            echo "<td>{$p->status}</td>";
            echo "<td>{$p->transport}</td>";
            echo "<td>{$p->payment}</td>";
            
      
       echo '<td>';
            echo '<a href="index.php?page=admin/financas&action=adicionar-encomenda&id='.$p->id.'">adicionar</a>';
            echo '<td>';
            echo '<a href="index.php?page=admin/financas&action=delete-encomenda&id='.$p->id.'">Delete</a>';
            echo '<br/>';
            echo '<a href="index.php?page=/admin/updateOrder.php&id='.$p->id.'">update</a>';
            echo '</td>';
        ?>
    </tr>
    <?php
        }
        $orders->closeCursor();
}
        ?>
</table>
 