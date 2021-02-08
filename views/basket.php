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

    <div id="<?=$item['id']?>" class="shopping-cart__box">
        <div class="shopping-cart__box__left">
            <div class="shopping-cart__box__left__img"><img style="width: 100px" src="<?=\app\engine\App::call()->config['images_dir'] . $item['image'];?>" alt=""></div>
            <div class="shopping-cart__box__description">
                <a href="/product/card/?id=<?=$item['product_id']?>"><?=$item['name']?></a>
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
                <i data-id="<?=$item['id']?>" class="fas fa-minus decrement"></i>
                <li id="<?=$item['id']?>_qty" "><?=$item['qty']?></li>
                <i data-id="<?=$item['id']?>" class="fas fa-plus increment"></i>
                <li>FREE</li>
                <li>$<span id="<?=$item['id']?>_subtotal"><?=$item['price'] * $item['qty']?></span></li>
                <li><i data-id="<?=$item['id']?>" class="fas fa-times-circle delete-from-basket"></i></li>
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
<script>

    let buttons = document.querySelectorAll('.delete-from-basket');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {

            let basket_id = elem.getAttribute('data-id');

            (
                async () => {
                    const response = await fetch('/basket/delete/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: basket_id
                        })
                    })
                    const answer = await response.json();
                    document.getElementById('cartCount').innerText = answer.count;
                    document.getElementById(basket_id).remove();
                }
            )();
        })
    });

    let buttons_incr = document.querySelectorAll('.increment');

    buttons_incr.forEach((elem) => {
        elem.addEventListener('click', () => {

            let basket_id = elem.getAttribute('data-id');


            (
                async () => {
                    const response = await fetch('/basket/increment/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: basket_id
                        })
                    })
                    const answer = await response.json();
                    document.getElementById('cartCount').innerText = answer.count;
                    document.getElementById('<?=$item['id']?>_qty').innerText = answer.qty;
                    document.getElementById('<?=$item['id']?>_subtotal').innerText = answer.subtotal;
                }
            )();
        })
    });

    let buttons_decr = document.querySelectorAll('.decrement');

    buttons_decr.forEach((elem) => {
        elem.addEventListener('click', () => {

            let basket_id = elem.getAttribute('data-id');


            (
                async () => {
                    const response = await fetch('/basket/decrement/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: basket_id
                        })
                    })
                    const answer = await response.json();
                    document.getElementById('cartCount').innerText = answer.count;
                    if(answer.qty == 0) {
                        document.getElementById(basket_id).remove();
                    } else {
                        document.getElementById('<?=$item['id']?>_qty').innerText = answer.qty;
                        document.getElementById('<?=$item['id']?>_subtotal').innerText = answer.subtotal;
                    }
                }
            )();
        })
    });
</script>