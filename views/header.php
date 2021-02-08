<header class="header center">
    <div class="header__left">
        <a class="logo" href="/">
            <img class="logo__img" src="/img/logo.png" alt="logo">
            BRAN<span class="text_color_red">D</span>
        </a>
        <form class="header__form" action="#">
            <details class="header__form__button">
                <summary>Browse</summary>
                <div class="drop-menu header-drop">
                    <div class="drop-menu__box">
                        <h2>Women</h2>
                        <ul>
                            <li><a class="drop-menu__link" href="#">Dresses</a></li>
                            <li><a class="drop-menu__link" href="#">Tops</a></li>
                            <li><a class="drop-menu__link" href="#">Sweaters/Knits</a></li>
                            <li><a class="drop-menu__link" href="#">Jackets/Coats</a></li>
                            <li><a class="drop-menu__link" href="#">Blazers</a></li>
                            <li><a class="drop-menu__link" href="#">Denim</a></li>
                        </ul>
                        <h2>Man</h2>
                        <ul>
                            <li><a class="drop-menu__link" href="#">Dresses</a></li>
                            <li><a class="drop-menu__link" href="#">Tops</a></li>
                            <li><a class="drop-menu__link" href="#">Sweaters/Knits</a></li>
                            <li><a class="drop-menu__link" href="#">Jackets/Coats</a></li>
                        </ul>
                    </div>
                </div>
            </details>
            <input class="header__form__input" type="text" placeholder="Search for Item...">
            <a class="header__form__search" href="#"><i class="fas fa-search"></i></a>
        </form>
    </div>
    <div class="header__right">
        <?php if ($auth): ?>
        <span>Привет: <?=$username?></span>
         <a class="header__form__button" href="/auth/logout/">Выйти</a>
        <?php else: ?>

            <form class="header__form__auth" action="/auth/login/" method="post">
                <input class="header__form__auth-input" width="30px" type="text" name="login" placeholder="Login">
                <input class="header__form__auth-input" type="password" name="pass" placeholder="Password">
                <input class="header__form__button" type="submit" name="submit" value="Enter">
            </form>
            <a class="header__form__button" href="/auth/reg/">Register</a>
        <?php endif; ?>
        <a class="cart-link" href="/basket/"><img class="header__cart" src="/img/cart.svg" alt="cart">
            <div class="cartCount" id="cartCount"><?= $cartCount ?></div>
        </a>
        <details class="header__right__details">
            <summary class="button account-details">My Account</summary>
            <div class="drop-menu header-drop cart-drop">
                <?php if (!empty($basket)): ?>
                <?php foreach ($basket as $item):?>
                <div class="drop-menu__box cart-drop__box">
                    <a href="/product/card/?id=<?=$item['id']?>"><img style="width: 100px" src="<?=\app\engine\App::call()->config['images_dir'] . $item['image'];?>" alt="img" class="cart-drop__img"></a>
                    <div class="cart-drop__box__content">
                        <span><?=$item['name']?></span>
                        <span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                        <span><?=$item['qty']?> x $<?=$item['price']?></span>
                    </div>
                    <div class="cross">
                        <a href="#"><i class="fas fa-times-circle"></i></a>
                    </div>
                </div>
                <?php endforeach;?>
                    <div class="drop-menu__box cart-drop__box total">
                        <span>total</span>
                        <!--                    <span>$500</span>-->
                    </div>
                <?php else: ?>
                    <div class="drop-menu__box cart-drop__box total">
                        <span>Корзина пуста</span>
                    </div>
                <?php endif; ?>

                <div class="drop-menu__box cart-drop__box cart-button">
                    <a class="cart-button-red" href="/checkout">checkout</a>
                </div>
                <div class="drop-menu__box cart-drop__box cart-button">
                    <a class="cart-button-blue" href="/">go to start</a>
                </div>
            </div>
        </details>
    </div>
</header>