<h2>Корзина</h2>
<div class="container">
    <div class="gallery">
        <?php if ($basket): ?>
            <?php foreach ($basket as $item):?>
                <div class="item">
                    <p><?=$item['name']?></p>
                    <img src="<?=IMAGES_DIR . $item['image'];?>" alt="img">
                    <p><?=$item['description']?></p>
                    <p><?=$item['price']?></p>
                    <hr>
                </div>
            <?php endforeach;?>
        <?php else: ?>
            <p>В корзине пока нет товаров...</p>
        <?php endif;?>
    </div>
</div>