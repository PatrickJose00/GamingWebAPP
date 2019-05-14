
<?php
  

   $product_categories = product_categories::getALL();

?>
<form id="criarprod"  enctype="multipart/form-data" method="post"> 
  
   
       
      
        <div>
            
        <label>Nome: </label>
        <input type="text" name="name"/>
        <br/><br/><br/>
        <label>Descrição: </label>
        <input type="text" name="description"/>
        <br/><br/><br/>
        <label>Preço: </label>
        <input type="number" name="price"/>
        <br/><br/><br/>
        <label>Stock: </label>
        <input type="number" name="stock"/>
        <br/><br/><br/>
        <label>Category Name </label>
        <select name="product_categories_id">
            <?php foreach($product_categories as $product_category): ?>
                <option value="<?php echo $product_category->id; ?>"><?php echo $product_category->name; ?></option>
            <?php endforeach; ?>
        </select>
        <br/><br/><br/>
        <label>Imagem do Produto: </label>
        
        <input type="file" name="image" accept="image/png"/>
        </div>
          
<!--        <label>Categoria: </label>
         <input type="text" name="categorie"/>
        <br/><br/><br/>-->

        <input type="submit" value="Criar Produto" name="criar-produto"/>
        <br/><br/><br/>
        
      
   


