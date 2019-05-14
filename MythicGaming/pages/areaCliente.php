<?php //
   
    require_once(dirname(__FILE__)."/../BL/customer.php");
    require_once(dirname(__FILE__)."/../BL/user.php");
    
    ?>

<?php
$id=UserController::getSessionUserId();
if($id){

$user = new user();
$user->id=$id;
$user->getById();
$customer = new customer();
//$customer->getCustomerByUser();
$customer->id=$id;
$customer->getById();
                  
                


?>
<div class="Titulos">
   Informação Pessoal
     
</div>
<div class="Titulos">
    <form method="post">
        
       
        
        <label>Login: </label>
        <input style="width: 30%;" type="text" name="login" value="<?PHP echo $_POST['login'] = $user->login; ?>" />
        <br/><br/><br/>
        
        <label>Email: </label>
        <input style="width: 30%;" type="text" name="email" value="<?PHP echo $_POST['email'] = $user->email; ?>" />
        <br/><br/><br/>
        
        <label>Password: </label>
        <input style="width: 30%;" type="password" name="password" value="<?PHP echo $_POST['password'] = $user->password; ?>" />
        <br/><br/><br/>
      
        
        
        <label>Name: </label>
        <input style="width: 30%;" type="text" name="name" value="<?PHP echo $_POST['name'] = $customer->name; ?>" />
        <br/><br/><br/>

        <label>Adress: </label>
        <input style="width: 30%;" type="text" name="adress"  value="<?PHP echo $_POST['adress'] = $customer->adress; ?>"/>
        <br/><br/><br/>
        
        <label>City: </label>
        <input style="width: 30%;" type="text" name="city" value="<?PHP echo $_POST['city'] = $customer->city; ?>"  />
        <br/><br/><br/>

        <label>Country: </label>
        <input style="width: 30%;" type="text" name="country" value="<?PHP echo $_POST['country'] = $customer->country; ?>"  />
        <br/><br/><br/>

        <label>Postalcode: </label>
        <input style="width: 30%;" type="text" name="postalcode" value="<?PHP echo $_POST['postalcode'] = $customer->postalcode; ?>"  />
        <br/><br/><br/>
        
         



     
      
<!--
       <input type="submit" value="Actualizar" name="update-userClient" id="button3"/>
        <br/><br/><br/>
    </form>
    
</div>

<a style= "" href="index.php?page=admin/listaencomendas.php"  id="button3">Lista Encomendas</a>
-->





<div style="position:absolute; margin-left: 30px; margin-top: 10px;">
    <table>
        <tr>
 <input type="submit" value="Actualizar" name="update-userClient" id="button3"/>
</tr>
 <tr>
<a style= "margin-left: 20px;" href="index.php?page=admin/listaencomendas.php"  id="button3">Lista Encomendas</a>

</tr>
    </table>
    <table>
</div>
<?php
}               


?>


