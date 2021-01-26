<main class="shopping-cart center">
    <nav class="shopping-cart__nav">
        <h2 class="shopping-cart__nav__title">Product Details</h2>
        <ul class="shopping-cart__nav__list">
            <li>unite Price</li>
            <li>Quantity</li>
            <li>shipping</li>
            <li>Subtotal</li>
            <li>ACTION</li>
        </ul>
    </nav>
    <?php foreach ($basket as $item):?>
    <div class="shopping-cart__box">
        <div class="shopping-cart__box__left">
            <div class="shopping-cart__box__left__img"><img style="width: 100px" src="<?=IMAGES_DIR . $item['image'];?>" alt=""></div>
            <div class="shopping-cart__box__description">
                <a href="#"><?=$item['name']?></a>
                <span>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </span>
                <br>
                <span>Color:</span> <span class="box__color">Red</span>
                <br>
                <span>Size:</span> <span class="box__color">XL</span>
            </div>
        </div>
        <div class="shopping-cart__box__right">
            <ul class="shopping-cart__box__list">
                <li>$<?=$item['price']?></li>
                <li><input type="number" placeholder="<?=$item['qty']?>"></li>
                <li>FREE</li>
                <li>$<?=$item['price'] * $item['qty']?></li>
                <li><a href="#"><i class="fas fa-times-circle"></i></a></li>
            </ul>
        </div>
    </div>
    <?php endforeach;?>
    <div class="shopping-cart__actions">
        <div class="shopping-cart__button"><a href="#">cLEAR SHOPPING CART</a></div>
        <div class="shopping-cart__button"><a href="#">cONTINUE sHOPPING</a></div>
    </div>
    <div class="shopping-cart__form">
        <div class="shopping-cart__form__box shopping-cart__form__box__left">
            <h2>Shipping Adress</h2>
            <form action="#">
                <details>
                    <summary>Bangladesh</summary>
                </details>
                <input type="text" name="State" id="State" placeholder="State">
                <input type="text" name="Postcode" id="Postcode" placeholder="Postcode / Zip">
                <button type="submit">get a quote</button>
            </form>
        </div>
        <div class="shopping-cart__form__box shopping-cart__form__box__center">
            <h2>coupon discount</h2>
            <p>Enter your coupon code if you have one</p>
            <form action="#">
                <details>
                    <summary>Bangladesh</summary>
                </details>
                <input type="text" name="State" id="State1" placeholder="State">
                <button type="submit">Apply coupon</button>
            </form>
        </div>
        <div class="shopping-cart__form__box shopping-cart__form__box__right">
            <h2>Sub total <span>$900</span></h2>
            <p>GRAND TOTAL <span>$900</span></p>
            <form action="#">
                <button type="submit">Apply coupon</button>
            </form>
        </div>
    </div>
</main>
