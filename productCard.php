<?php
    $link=  "index.php?product=".$id;
?>
<div class="card">
    <a href="index.php?product=<?=$id?>" >
        <img src="img/Test1.jpg" alt="image">
        <div class="cont1">
            <p class="price">19.99€</p>
            <p class="BestSeller">Bestseller!</p>

        </div>
        <div class="cont2">
            <p class="title">The Royalty</p>
            <p class="sold">3015 sold</p>
            <p class="shipping">Shipping in 10 business days</p>
            <p> DEBUG: <?php echo $id ?></p>
        </div>
    </a>
</div>