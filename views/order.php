<?php if ($isAdmin): ?>
<div class="orders">
    <h2>Состав заказа</h2>
    <table class="order-list">
        <tr>
            <td class="order-list-td"><span>Имя пользователя: </span><?=$params['user_name']?></td>
            <td class="order-list-td"><span>Телефон: </span><?=$params['phone']?></td>
            <td class="order-list-td"><span>E-mail: </span><?=$params['email']?></td>
            <td class="order-list-td"><span>Статус заказа: </span><?=$params['status']?></td>
        </tr>
    </table>
    <?php foreach ($order as $item):?>
        <table  class="order-list">
            <tr>
                <td class="order-list-td"><span>Товар: </span><?=$item['name']?></td>
                <td class="order-list-td"><span>Цена: </span><?=$item['price']?></td>
                <td class="order-list-td"><span>Количество: </span><?=$item['qty']?></td>
                <td class="order-list-td"><span>Сумма: </span><?=$item['qty'] * $item['price']?></td>
            </tr>
        </table>
    <?php endforeach;?>
    <p class="total-order-sum">Общая сумма заказа: <?= $totalSum ?></p>
    <form class="status-form" action="/orders/change/" method="post">
        <div class="status-form__wrapper">
            <div><input type="radio" name="status" value="new">Новый</div>
            <div><input type="radio" name="status" value="paid">Оплачен</div>
            <div><input type="radio" name="status" value="inWork">В работе</div>
            <div><input type="radio" name="status" value="completed">Выполнен</div>
            <div><input type="radio" name="status" value="cancelled">Отменён</div>
            <input type="text" name="user_name" value="<?=$params['user_name']?>" hidden>
            <input type="text" name="phone" value="<?=$params['phone']?>" hidden>
            <input type="text" name="email" value="<?=$params['email']?>" hidden>
            <input type="text" name="session_id" value="<?=$session_id ?>" hidden>
        </div>
        <button id="change-btn" class="order_details back-btn change-btn" type="submit">Изменить статус</button>
    </form>

</div>
    <button class="order_details back-btn"><a href="/admin/" >Назад</a></button>
<?php else: ?>
<h2>Доступ запрещён</h2>
<?php endif; ?>