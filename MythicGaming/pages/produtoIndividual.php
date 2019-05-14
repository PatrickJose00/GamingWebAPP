<?php
require_once(dirname(__FILE__) . "/../Controller/ProductController.php");
require_once(dirname(__FILE__) . "/../BL/product.php");
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    
    $prod = product::getById($pid);
    
    if (isset($prod)){
?>
<div class="content individual" id="container-individual">
    <div id="product-individual-"<?php echo $prod->id; ?>>
        <div class="produto-imagem">
            <?php echo '<img src="data:image/png;base64,'.base64_encode( $prod->image ).'" alt="'.$prod->name.'" title="'.$prod->name.'" class="img-product-individual"/>'; ?>
        </div>
        <div class="produto-info">
            <div class="produto-nome-preco">
                <div class="produto-nome">
                    <?php echo '<span class="produto-nome-text">'.$prod->name.'</span>'; ?>
                </div>
                <div class="produto-preco">
                    <?php echo '<span class="produto-price">'.$prod->price.'€</span>'; ?>
                </div>
            </div>
            <div class="produto-adicionar">
                <form method="POST" action="index.php?page=cart.php">
                    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                    <input type="submit" value="Adicionar ao Carrinho" name="adicionar_carrinho" id="button" style="margin-left: 80px; margin-top: 35px;"/>
                </form>
            </div>
        </div>
        <div class="clear"></div>
        <div class="produto-descricao">
            <?php echo '<span class="product-desc">'.$prod->description.'</span>'; ?>
        </div>
<?php        
    }else{
        echo '<h1 style="text-align: center; color: white; line-height: 500px; font-size: 40px;">-- Produto não disponível --<h1>';
    }
?>
</div>
<?php
}
?>

