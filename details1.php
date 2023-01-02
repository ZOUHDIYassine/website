<?php

   $con=mysqli_connect('localhost','root');
   mysqli_select_db($con,'evet');
    $sql="SELECT*FROM products WHERE id=1";
    $featured=$con->query($sql);

?>
<div class="col-md-2"></div>
       <div class="col-md-8">
                <div class="row">
                        <h2 class="text-center">Description du produit :</h2><br> <br>
                        <?php
                        while($product=mysqli_fetch_assoc($featured)):
                        
                        ?>
                        <div class="col-md-5">
                          <h4><?=$product['title'];?></h4>
                          <img src="<?=$product['image'];?>"alt="<?=$product['title']; ?>"/>
                          <p class="bname">Marque : <?=$product['brandname'];?></p>
                          <p class="price">Prix : <?=$product['price'];?></p>
                          <p class="desc">Description :  <?=$product['description'];?></p>
                        </div>
                        <?php endwhile; ?>
                </div>
       </div>