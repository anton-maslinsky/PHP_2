<?php if($isAdmin): ?>
<div class="orders">
    <h2>Список заказов</h2>
    <?php foreach ($orders as $item):?>
        <form action="/orders/get/" method="post">
            <table  class="order-list">
                <tr>
                    <td class="order-list-td"><span>Имя пользователя: </span><?=$item['user_name']?></td>
                    <td class="order-list-td"><span>Телефон: </span><?=$item['phone']?></td>
                    <td class="order-list-td"><span>Статус заказа: </span><?=$item['status']?></td>
                    <input type="text" name="session_id" value="<?=$item['session_id']?>" hidden>
                    <input type="text" name="user_name" value="<?=$item['user_name']?>" hidden>
                    <input type="text" name="phone" value="<?=$item['phone']?>" hidden>
                    <input type="text" name="email" value="<?=$item['email']?>" hidden>
                    <input type="text" name="status" value="<?=$item['status']?>" hidden>
                    <td class="order-list-td"><button type="submit" class="order_details">Просмотр заказа</button></td>
                </tr>
            </table>
        </form>
    <?php endforeach;?>
</div>
<?php else: ?>
    <b>Доступ запрещён!</b>
<?php endif; ?>
