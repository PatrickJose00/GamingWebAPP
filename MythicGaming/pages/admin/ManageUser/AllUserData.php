

<?php
      require_once(dirname(__FILE__)."/../../../BL/user.php"); 
      require_once(dirname(__FILE__)."/../../../BL/customer.php"); 
   
    $user = user::AllDATA();
   
?>

<?php
    
if(UserController::isLoggedUserAdmin()) {

?>

<table class="financas">
    
    <tr>
      <th>Name</th>
      <th>Login</th>
      <th>Password</th>
      <th>Email</th>
      <th>Adress</th>
      <th>City</th>
      <th>Country</th>
      <th>PostalCode</th>
        
        
        
       
 
       
    </tr>
    
    <?php
        while($p = $user->fetch()) {
            ?>
    <tr>
        <?php
        echo "<td>{$p->name}</td>";
        echo "<td>{$p->login}</td>";
        echo "<td>{$p->password}</td>";
        echo "<td>{$p->email}</td>";
        echo "<td>{$p->adress}</td>";
        echo "<td>{$p->city}</td>";
        echo "<td>{$p->country}</td>";
        echo "<td>{$p->postalcode}</td>";
           
          
      

       ?>
    </tr>
    <?php
        }
        $user->closeCursor();
}
        ?>
</table>
 <?php
