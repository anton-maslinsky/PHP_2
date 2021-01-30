<nav class="breadcrumbs center" aria-label="breadcrumb">
    <h2 class="breadcrumbs-title">New Arrivals</h2>
    <ol class="breadcrumbs-ol">
        <li class="breadcrumb-ol__item"><a href="/">Home</a></li>
        <li class="breadcrumb-ol__item"><a href="#">Women</a></li>
        <li class="breadcrumb-ol__item breadcrumb-ol__item__active" aria-current="page">new arrivals</li>
    </ol>
</nav>
<div class="single-page">
    <div class="single-page__slider">
        <a class="angle-left" href="#"><i class="fas fa-angle-left"></i></a>
        <img src="<?=IMAGES_DIR . $item->image;?>" alt="img">
        <a class="angle-right" href="#"><i class="fas fa-angle-right"></i></a>
    </div>
    <div class="product-description">
        <div class="product-description__content">
            <h2 class="product-description__title"><?=$item->name?></h2>
            <h1 class="product-description__name"><?=$item->description?></h1>
            <p>Compellingly actualize fully researched processes before proactive outsourcing. Progressively
                syndicate collaborative architectures before cutting-edge services. Completely visualize parallel
                core competencies rather than exceptional portals. </p>
            <div><span class="sub__title">MATERIAL: <span>COTTON</span> </span> <span class="sub__title">DESIGNER:
                        <span>BINBURHAN</span> </span></div>
            <div class="price"><span>$<?=$item->price?></span></div>
            <div class="choose-block">
                <div>
                    <h2>choose color</h2>
                    <details class="choose-block__color">
                        <summary>Red</summary>
                        <ul>
                            <li>Red</li>
                            <li>Green</li>
                            <li>Blue</li>
                            <li>Yellow</li>
                            <li>Black</li>
                        </ul>
                    </details>
                </div>
                <div>
                    <h2>CHOOSE SIZE</h2>
                    <details class="choose-block__size">
                        <summary>XXL</summary>
                        <ul>
                            <li>L</li>
                            <li>XL</li>
                            <li>XXL</li>
                            <li>S</li>
                            <li>XS</li>
                            <li>M</li>
                            <li>XM</li>
                        </ul>
                    </details>
                </div>
                <div>
                    <h2>QUANTITY</h2>
                    <input type="text" placeholder="2">
                </div>
            </div>
            <div class="Add-to-cart-button product-description__button"><a href="#"><img
                            src="/img/icons/Add-to-cart.png" alt="cart"> Add to Cart</a></div>
        </div>
    </div>
    <div class="product-box center">
        <div class="product-box__title">
            <h2 class="single-page-product-box__title">you may like also</h2>
        </div>
        <div class="product-box__list">
            <div class="product">
                <a href="#" class="product__img single-product__img"><img src="/img/product/Blase-leggings.png"
                                                                          alt="img"></a>
                <div class="product__content">
                    <a href="#" class="single-product__name">Blase LEGGINGS</a>
                    <p class="product__price">$52.00<span class="product__star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                    </p>
                </div>
                <a class="product__add" href="#">Add to Cart</a>
            </div>
            <div class="product">
                <a href="#" class="product__img single-product__img"><img src="/img/product/Alexa-sweater.png"
                                                                          alt="img"></a>
                <div class="product__content">
                    <a href="#" class="single-product__name">ALEXA SWEATER</a>
                    <p class="product__price">$52.00<span class="product__star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span></p>
                </div>
                <a class="product__add" href="#">Add to Cart</a>
            </div>
            <div class="product">
                <a href="#" class="product__img single-product__img"><img src="/img/product/Agnes-top.png"
                                                                          alt="img"></a>
                <div class="product__content">
                    <a href="#" class="single-product__name">AGNES TOP</a>
                    <p class="product__price">$52.00
                        <span class="product__star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                    </p>
                </div>
                <a class="product__add" href="#">Add to Cart</a>
            </div>
            <div class="product">
                <a href="#" class="product__img single-product__img"><img src="/img/product/Sylva-sweater.png"
                                                                          alt="img"></a>
                <div class="product__content">
                    <a href="#" class="single-product__name">SYLVA SWEATER</a>
                    <p class="product__price">$52.00<span class="product__star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span></p>
                </div>
                <a class="product__add" href="#">Add to Cart</a>
            </div>
        </div>
    </div>
</div>
