<?php
require_once(dirname(__FILE__) . "/../Controller/controller.php");

 
?>



<form method="POST" id="log1">
    
        <label>name</label>
        <input type="text" name="name"/><br/><br/>
        <label>Address</label>
        <input type="text" name="adress"/><br/><br/>
        <label>City</label>
        <input type="text" name="city"/><br/><br/>
        <label>Country</label>
        <input type="text" name="country"/><br/><br/>
        <label>Postal Code</label>
        <input type="text" name="postalcode"/><br/><br/>
        <label>username</label>
        <input type="text" name="login"/><br/><br/>
        <label>password</label>
        <input type="password" name="password"/><br/><br/>
        <label>email</label>
        <input type="email" name="email"/><br/><br/>
        
        <br/><br/>
        <input type="submit" value="registar" name="criar-util" id="button"/>
</form>
