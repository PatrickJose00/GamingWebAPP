

<?php
   require_once(dirname(__FILE__)."/../../BL/customer.php"); 

    $customer= customer::getALL();
   



?>
<!--<div style="position:absolute; margin-left: 30px; margin-top: 50px;">
    <table>
        <tr>
<a  href="index.php?page=admin/ManageCustomer/CreateCustomer" id="button1">New Customer</a>
</tr>
</table>-->

<table class="financas">
    
    <tr>
       
        <th>ID</th>
        <th>Nome</th>
        <th>Morada</th>
        <th>Cidade</th>
        <th>Pais</th>
        <th>Codido-Postal</th>
        <th>User-ID</th>
     
     
    </tr>
    
    <?php
        while($c = $customer->fetch()) {
            ?>
    <tr>
        <?php
            echo "<td>{$c->id}</td>";
            echo "<td>{$c->name}</td>";
            echo "<td>{$c->adress}</td>";
            echo "<td>{$c->city}</td>";
            echo "<td>{$c->country}</td>";
             echo "<td>{$c->postalcode}</td>";
             echo "<td>{$c->user_id}</td>";
            
     
      
//             echo '<td>';
//            echo '<a href="index.php?page=admin/ManageCustomer/CreateCustomer&action=Create-customer&id='.$c->id.'">Create</a>';
            echo '<td>';
            echo '<a href="index.php?page=admin/Customer&action=delete-customer&id='.$c->id.'">Delete</a>';
           echo"<td>";
            echo '<a href="index.php?page=/admin/ManageCustomer/updateCustomer.php&id='.$c->id.'">update</a>';
            echo '</td>';
            ?>
    </tr>
    <?php
        
     
}
        ?>
</table>

