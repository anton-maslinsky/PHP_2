<section class="promo center">
    <div class="promo-box">
        <div class="promo__content">
            <h1 class="promo__h1">THE BRAND</h1>
            <h2 class="promo__h2">OF LUXERIOUS <span class="text_color_red">FASHION</span> </h2>
        </div>
    </div>
</section>
<div class="category center">
    <div class="category__box">
        <div class="category__offer__1 category__offer">
            <div class="category__description">
                <h2 class="category__description__normal">HOT DEAL</h2>
                <p class="category__description__red text_color_red">FOR MEN</p>
            </div>
        </div>
        <div class="category__offer__2 category__offer">
            <article class="category__description">
                <h2 class="category__description__normal">LUXIROUS & trendy</h2>
                <p class="category__description__red text_color_red">ACCESORIES</p>
            </article>
        </div>
    </div>
    <div class="category__box">
        <div class="category__offer__3 category__offer">
            <article class="category__description">
                <h2 class="category__description__normal">30% offer</h2>
                <p class="category__description__red text_color_red">women</p>
            </article>
        </div>
        <div class="category__offer__4 category__offer">
            <div class="category__description">
                <h2 class="category__description__normal">new arrivals</h2>
                <p class="category__description__red text_color_red">FOR kids</p>
            </div>
        </div>
    </div>
</div>
<div class="product-box center">
    <div class="product-box__title">
        <h2>Fetured Items</h2>
        <p>Shop for items based on what we product in this week</p>
    </div>
    <div class="product-box__list">
        <?php
        use app\model\Product;
        $catalog = Product::getAll();
        foreach ($catalog as $item):?>
            <div class="product">
                <a href="/?c=product&a=card&id=<?=$item['id']?>" class="product__img">
                    <img src="<?=IMAGES_DIR . $item['image'];?>" alt="img">
                </a>
                <div class="product__content">
                    <a href="#" class="product__name"><?=$item['name']?></a>
                    <p class="product__price">$<?=$item['price']?><span class="product__star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                    </p>
                </div>
                <a class="product__add" href="/?c=basket&a=add&id=<?=$item['id']?>">Add to Cart</a>
            </div>
        <?php endforeach;?>
    </div>
    <div class="product__button"><a href="/?c=product&a=catalog" class="product__button__link button">Browse All Product <i class="fas fa-long-arrow-alt-right"></i></a></div>
</div>
<div class="feature center">
    <div class="feature__banner">
        <section class="feature__banner__title">
            <h2>30% <span class="text_color_red">OFFER</span></h2>
            <p>FOR WOMEN</p>
        </section>
    </div>
    <div class="feature__box__list">
        <div class="feature__box">
            <img src="img/icons/Forma_1.png" alt="icon">
            <div class="feature__box__content">
                <h2>Free Delivery</h2>
                <p>Worldwide delivery on&nbsp;all. Authorit tively morph next-generation innov tion with extensive models.</p>
            </div>

        </div>
        <div class="feature__box">
            <img src="img/icons/Forma_2.png" alt="icon">
            <div class="feature__box__content">
                <h2>Sales & discounts</h2>
                <p>Worldwide delivery on&nbsp;all. Authorit tively morph next-generation innov tion with extensive models.</p>
            </div>
        </div>
        <div class="feature__box">
            <img src="img/icons/Forma_3.png" alt="icon">
            <div class="feature__box__content">
                <h2>Quality assurance</h2>
                <p>Worldwide delivery on&nbsp;all. Authorit tively morph next-generation innov tion with extensive models.</p>
            </div>
        </div>
    </div>
</div>