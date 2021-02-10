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
    <p class="order-message"><?=$message?></p>
    <?php if($basket): ?>
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
    <?php endif; ?>
    <div class="shopping-cart__actions">
        <div class="shopping-cart__button"><a href="#">cLEAR SHOPPING CART</a></div>
        <div class="shopping-cart__button"><a href="#">cONTINUE sHOPPING</a></div>
    </div>
    <form class="shopping-cart__form" action="/orders/create/" method="post">
        <div class="shopping-cart__form__box shopping-cart__form__box__left">
            <h2>Shipping details</h2>
            <div>
                <input type="text" name="name" id="name" placeholder="Your name" required>
                <input type="phone" name="phone" id="phone" placeholder="Your phone number" required>
                <button>get a quote</button>
            </div>
        </div>
        <div class="shopping-cart__form__box shopping-cart__form__box__left">
            <h2>contacts</h2>
            <div >
                <input type="text" name="address" id="address" placeholder="Address">
                <input type="email" name="email" id="email" placeholder="Your email" required>
                <button>Apply coupon</button>
            </div>
        </div>
        <div class="shopping-cart__form__box shopping-cart__form__box__right">
            <h2><span></span></h2>
            <p>TOTAL SUM: <span>$<span id="total_sum"><?=$totalSum ?></span></span></p>
                <button type="submit">Make order</button>
        </div>
    </form>
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
                    document.getElementById('total_sum').innerText = answer.totalSum;
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
                        document.getElementById('total_sum').innerText = answer.totalSum;
                    }
                }
            )();
        })
    });
</script>