<?php
   require_once(dirname(__FILE__)."/../../BL/user.php"); 

    $user = user::getALL();
   
?>

<div style="position:absolute; margin-left: 30px; margin-top: 50px;">
    <table>
        <tr>
<!-- <a  href="index.php?page=admin/ManageUser/createUser&action" id="button1">New User</a>-->
    </tr>
    <tr>
 <a style="margin-left: 20px;" href="index.php?page=admin/ManageUser/AllUserData&action" id="button1">Dados dos Utilizadores</a>
 </tr>
    </table>
<table class="financas">
    
    <tr>
       
        <th>ID</th>
        <th>Email</th>
        <th>Password</th>
        <th>Login</th>
    
     
     
    </tr>
   
    <?php
        while($p = $user->fetch()) {
            ?>
    <tr>
        <?php
            echo "<td>{$p->id}</td>";
            echo "<td>{$p->email}</td>";
            echo "<td>{$p->password}</td>";
            echo "<td>{$p->login}</td>";
           
     
    
//             echo '<td>';
//            echo '<a href="index.php?page=admin/ManageUser/createUser&action=Create&id='.$p->id.'">Create</a>';
            echo '<td>';
            echo '<a href="index.php?page=admin/User&action=delete-user&id='.$p->id.'">Delete</a>';
            echo"<td>";
            echo '<a href="index.php?page=/admin/ManageUser/updateUser.php&id='.$p->id.'">update</a>';
            echo '</td>';
            ?>
    </tr>
    <?php
        }
    
        ?>
</table>

