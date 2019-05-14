<?php
   
    require_once(dirname(__FILE__)."/../../../BL/customer.php");
    
    ?>

<?php

$customer = new customer();

$customer->id = $_GET['id'];

$customer->getById();



?>
<div class="Titulos">
   Update Orders
      <br/><br/><br/>
</div>
<div id="content">
    <form id="criarprod" method="post">
        
<!--        <label>ID: </label>
        <input type="hidden" name="id"/>
        <br/><br/><br/>-->
        
        <label>Name: </label>
        <input style="width: 30%;" type="text" name="name" value="<?PHP echo $_POST['name'] = $customer->name; ?>" />
        <br/><br/><br/>

        <label>Adress: </label>
        <input style="width: 30%;" type="text" name="adress"  value="<?PHP echo $_POST['adress'] = $customer->adress; ?>"/>
        <br/><br/><br/>
        
        <label>City: </label>
        <input style="width: 30%;"  type="text" name="city" value="<?PHP echo $_POST['city'] = $customer->city; ?>"  />
        <br/><br/><br/>

        <label>Country: </label>
        <input style="width: 30%;" type="text" name="country" value="<?PHP echo $_POST['country'] = $customer->country; ?>"  />
        <br/><br/><br/>

        <label>Postalcode: </label>
        <input style="width: 30%;" type="text" name="postalcode" value="<?PHP echo $_POST['postalcode'] = $customer->postalcode; ?>"  />
        <br/><br/><br/>


<!--        <label>User_id: </label>
        <input type="hidden" name="user_id"   value="<?PHP echo $_POST['user_id'] = $customer->user_id; ?>"/>
        <br/><br/><br/>
      -->

        <input type="submit" value="Actualizar" name="update1"/>
        <br/><br/><br/>
    </form>
    
</div>
