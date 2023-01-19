<?php
    $deliveryDays = 10;
    $bestseller = 'Bestseller!';
    $price = 15;
    $title = "TEST TITLE";
    $sold = 3015;
?>
<a href="index.php?product=<?=$id?>" >
    <div class="card">

        <img src="img/Test1.jpg" alt="image">
        <div class="cont1">
            <p class="price"><?=15?>€</p>
            <p class="BestSeller"><?=$bestseller?></p>

        </div>
        <div class="cont2">
            <p class="title"><?=$title?></p>
            <p class="sold"><?=$sold?> vendus</p>
            <p class="shipping">Expédition sous <?=  $deliveryDays?> jours </p>
            <p> DEBUG: <?= $id ?></p>
        </div>

    </div>
</a>