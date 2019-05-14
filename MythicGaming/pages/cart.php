<?php
    require_once(dirname(__FILE__)."/../Controller/ProductController.php"); 
    require_once(dirname(__FILE__) . "/../BL/product.php");
    
    if (isset($_POST['adicionar_carrinho'])) {
        $pid = $_POST['pid'];
        $index = ProductControlller::setSessionProductIdList($pid);
    
    }
    if (isset($_POST['eliminar_carrinho'])) {
        $pid = $_POST['pid'];
        $idx = $_POST['index'];
        ProductControlller::deleteSessionProductIdList($pid, $idx);
    }
   
    
    $lista_produtos_adicionados = ProductControlller::getSessionProductIdList();
    $lista_produtos_adicionados_index = ProductControlller::getSessionProductIdListIndex();
    
    if( !isset($lista_produtos_adicionados) && !isset($lista_produtos_adicionados_index)){
        echo "SEM PRODUTOS ADICIINADOS!!";
    }else{
    
    $i = 0;
    
    foreach ($lista_produtos_adicionados as $pid){
        
        $prod = product::getById($pid);
        
        ?>
<div class="prod-cart">
        <?php echo '<span class="produto-nome-text-cart" >'.$prod->name.'</span>' ; ?>
        <?php echo '<span class="produto-price-cart">'.$prod->price.'€</span>'; ?>

        <form method="POST" action="index.php?page=cart.php">
            <input type="hidden" name="pid" value="<?php echo $prod->id; ?>">
            <input type="hidden" name="index" value="<?php echo $lista_produtos_adicionados_index[$i]; ?>">
            <input type="submit" class="produto-eliminar-cart" value="Eliminar do Carrinho" name="eliminar_carrinho" id="button"/>
        </form>
</div>
<div class="clear"></div>
<?php
        $i++;
    }
    }
    
?>
