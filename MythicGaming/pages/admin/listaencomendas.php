<?php
   
    require_once(dirname(__FILE__)."/../../BL/customer.php");
    require_once(dirname(__FILE__)."/../../BL/user.php");
    
    ?>

<?php
$id=UserController::getSessionUserId();
if($id){

$user = new user();
$user->id=$id;
$user->getById();
$customer = new customer();
$customer->getCustomerByUser();
$user = user::encomendasUSER($user);
?>
<div>
<table class="financas">
    <div class="Titulos">
   Registo de Encomendas
     
</div>
    
    <tr>
            
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Nome Produto</th>
       
    </tr>

    
   
    <?php
   
    
  
    
        while($p = $user->fetch()) {
            ?>
    
     
    <tr>
        
       
        <?php
         
         
            echo "<td>{$p->name}</td>"; 
    
            echo "<td>{$p->price}</td>";
            echo "<td>{$p->quantity}</td>";
            echo "<td>{$p->ProductName}</td>";
         
            ?>

        <?php }
}
?>