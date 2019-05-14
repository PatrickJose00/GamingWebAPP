<?php
   
    require_once(dirname(__FILE__)."/../../../BL/user.php");
    
    ?>

<?php

$user = new user();

$user->id = $_GET['id'];

$user->getById();



?>
<div class="Titulos">
   Update User
      <br/><br/><br/>
</div>
<div id="content">
    <form id="criarprod"method="post">
        
  
<!--        <label>ID: </label>
        <input type="hidden" name="id"/>
        <br/><br/><br/>-->
        
        <label>Email: </label>
        <input style="width: 30%;" type="text" name="email"  value="<?PHP echo $_POST['email'] = $user->email; ?>"/>
        <br/><br/><br/>
        
        <label>Password: </label>
        <input style="width: 30%;" type="text" name="password" value="<?PHP echo $_POST['password'] = $user->password; ?>"  />
        <br/><br/><br/>

        <label>Login: </label>
        <input style="width: 30%;" type="text" name="login" value="<?PHP echo $_POST['login'] = $user->login; ?>"  />
        <br/><br/><br/>
        
        <label>Admin: </label>
        <input style="width: 30%;" type="number" name="admin" value="<?PHP echo $_POST['admin'] = $user->admin; ?>"  />
        <br/><br/><br/>

      

        <input type="submit" value="Update User" name="update-user"/>
        <br/><br/><br/>
    </form>
    
</div>
