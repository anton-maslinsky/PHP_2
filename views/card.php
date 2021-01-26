<h2>Товар</h2>
<div class="container">
    <div class="item">
        <b><?=$item->name?></b>
        <img src="<?=IMAGES_DIR . $item->image;?>" alt="img">
        <p><?=$item->description?></p>
        <b>Цена: <?=$item->price?> руб.</b>
    </div>
</div>

