<?php
    $size = 36; //todo à changer
    function changeSize($newSize){
        $size = $newSize;
    }
?>
<section class="devProductPage"  style="height: 900px; min-height: 900px">
    <div class="mainProductContainer">
        <div class="centerProductContainer">
            <div class="left">
                <div class="imgCont">
                    <img src="img/product/S3_1.png" class="mainImg">
                    <div class="otherImagesCont">
                        <img src="img/product/S3_2.png">
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="productTitle">
                    <h2>Banana chausson</h2>
                </div>
                <div class="currentSize">
                    <p>Taille actuelle</p>
                    <p> 36</p>
                </div>
                <div class="productPrice">
                    <p><?echo $price?>€</p>
                </div>
                <h3>Tailles disponibles</h3>
                <div class="sizeSelectCont">
                    <a>36-37</a>
                    <a>37-38</a>
                    <a>38-39</a>
                    <a>40-41</a>
                    <a>42-43</a>
                    <a>43-44</a>
                    <a>44-45</a>
                    <a>45-46</a>
                    <a>46-47</a>
                    <a>47-48</a>
                </div>
                <h3> Quantité</h3>
                <div>
                    <div class="qtySelectCont">
                        <label>
                            <select name="qty" id="productQtySelector">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </label>
                        <p> Plus que </p><p>10</p><p> paires disponibles.</p>
                    </div>
                    <div class="addToCartCont">
                        <button>Ajouter au panier</button>
                    </div>
                    <div class="descriptionCont">
                        <h3>Description</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
    </div>
</section>