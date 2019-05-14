<?php
require_once(dirname(__FILE__) . "/../Controller/ProductController.php");
require_once(dirname(__FILE__) . "/../BL/product.php");
if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
    $prod = Product::getByCat($cat);

    if (isset($prod) && ($prod->rowCount() > 0)) {
        $cont=1;
        $linha = "row-1";

        while ($row = $prod->fetch()) {
//            echo '<img src="data:image/png;base64,'.base64_encode( $row->image ).'"/>';
//            die;
//echo <<<HTML
//        <div id="product-$cont" class="row-$linha"
//        <a href="index.php?page=produtoIndividual.php"><img src="data:image/png;base64,base64_encode( $row->image )" alt="$row->name" title="$row->name" class="img-product"/></a>
//        <a href="index.php?page=produtoIndividual.php"><span class="product-text">$row->name</span></a>
//HTML;
echo '<div id="product-'.$cont.'" class="'.$linha.'">';
echo '<a href="index.php?page=produtoIndividual.php&pid='.$row->id.'"><img src="data:image/png;base64,'.base64_encode( $row->image ).'" alt="'.$row->name.'" title="'.$row->name.'" class="img-product"/></a>';
echo '<a href="index.php?page=produtoIndividual.php&pid='.$row->id.'"><span class="product-text">'.$row->name.'</span></a>';
echo '</div>';
            $cont++;
            if ($cont > 3 && $cont <5){
                $linha = "row-2";
            } elseif($cont > 5){
                $linha = "last-product";
            }
        }
    }else{
echo <<<HTML
        <h1 style="text-align: center; color: white; line-height: 500px; font-size: 40px;">-- Produto não disponível --<h1>
HTML;
    }
}
?>

<!--<div id="product-1" class="row-1">
    <a href="index.php?page=produtoIndividual.php"><img src="img/keyboard/SteelSeriesApex.png" alt="SteelSeries Apex" title="SteelSeries Apex" class="img-product"/></a>
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><span class="product-text">SteelSeries Apex</span></a>
</div>
<div id="product-2" class="row-1">
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><img src="img/keyboard/LogitechSkull.png" alt="Logitech Skull" title="Logitech Skull" class="img-product"/></a>
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><span class="product-text">Logitech Skull</span></a>
</div>
<div id="product-3" class="row-1">
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><img src="img/keyboard/RazerLycosa.png" alt="Razer Lycosa" title="Razer Lycosa" class="img-product"/></a>
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><span class="product-text">Razer Lycosa</span></a>
</div>
<div id="product-4" class="row-2">
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><img src="img/keyboard/SteelSeriesGW.png" alt="SteelSeries GW" title="SteelSeries GW" class="img-product"/></a>
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><span class="product-text">SteelSeries GW</span></a>
</div>
<div id="product-5" class="row-2">
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><img src="img/keyboard/LogitechG910.png" alt="Logitech G910" title="Logitech G910" class="img-product"/></a>
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><span class="product-text">Logitech G910</span></a>
</div>
<div id="product-6" class="last-product">
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><img src="img/keyboard/RazerBlackWidow.png" alt="Razer Black idow" title="Razer Black Widow" class="img-product"/></a>
    <a href="http://localhost/MythicGaming/public_html/produtoindividual.html"><span class="product-text">Razer Black Widow</span></a>
</div>-->