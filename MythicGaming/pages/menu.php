<?php
require_once(dirname(__FILE__)."/../Controller/controller.php");
$menu=Controller::mainMenu();
if(!empty($menu)){
  ?>  
<nav>
    <ul id="menu">
        <?php
            foreach($menu as $item){
                if(eval("return " . $item['visible'] .";")){
                    if ($item['text']=='Log Out'){
                        echo '<li id="logout"><a href="'. $item['url'] .'">'. $item['text'] .'</a></li>';
                    }else{
                        if ($item['text']=='Area de Cliente' || $item['text']=='Area de Admin'){
                        echo '<div id="client-area"><a href="'.$item['url'].'">'. $item['text'] .'</a></div>';
                    }  else {
                        echo '<li><a href="'. $item['url'] .'">'. $item['text'] .'</a></li>';
                    }
                    }
                }
            }
        ?>
    </ul>
</nav>
  <?php
  
}
?>