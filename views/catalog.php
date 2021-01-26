<h2>Каталог</h2>
<div class="container">
    <div class="gallery">
        <?php foreach ($catalog as $item):?>
        <div class="item">
            <h3><a href="/?c=product&a=card&id=<?=$item['id']?>"><?=$item['name']?></a></h3>
            <img src="<?=IMAGES_DIR . $item['image'];?>" alt="img">
            <p><?=$item['description']?></p>
            <p><?=$item['price']?></p>
            <a href="/?c=basket&a=add&id=<?=$item['id']?>"><button>Купить</button></a>
            <hr>
        </div>
        <?php endforeach;?>
    </div>
</div>
<a href="/?c=product&a=catalog&page=<?=$page?>">Далее</a>
