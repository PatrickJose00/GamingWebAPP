<?php
   
    require_once(dirname(__FILE__)."/../../../BL/orders.php");
    
    ?>

<?php

$orders = new Orders();

$orders->id = $_GET['id'];

$orders->getById();



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
        
        <label>Transport: </label>
        <input style="width: 30%;" type="text" name="transport" value="<?PHP echo $_POST['transport'] = $orders->transport; ?>" />
        <br/><br/><br/>

        <label>date: </label>
        <input style="width: 30%;" type="text" name="date"  value="<?PHP echo $_POST['date'] = $orders->date; ?>"/>
        <br/><br/><br/>
        
        <label>Payment: </label>
        <input style="width: 30%;" type="text" name="payment" value="<?PHP echo $_POST['payment'] = $orders->payment; ?>"  />
        <br/><br/><br/>

        <label>Status: </label>
        <input style="width: 30%;" type="number" name="status"  value="<?PHP echo $_POST['status'] = $orders->status; ?>"  />
        <br/><br/><br/>

        <label>Quantity: </label>
        <input style="width: 30%;" type="number" name="quantity"  value="<?PHP echo $_POST['quantity'] = $orders->quantity; ?>"  />
        <br/><br/><br/>

        <input  type="submit" value="Actualizar" name="update-orders"/>
        <br/><br/><br/>
    </form>
    
</div>
