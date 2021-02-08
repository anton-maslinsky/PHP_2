<?php foreach ($orders as $item):?>

<div>
    <h2>Имя пользователя: <?=$item['user_name']?></h2>
    <span>Телефон: <?=$item['phone']?></span>
    <span>Статус заказа: <?=$item['status']?></span>
    <button data-id="<?=$item['session_id']?>" class="order_details">Просмотр заказа</button>
</div>

<?php endforeach;?>

<script>

    let buttons = document.querySelectorAll('.order_details');

    buttons.forEach((elem) => {

        elem.addEventListener('click', () => {
            let session_id = elem.getAttribute('data-id');

            (
                async () => {
                    const response = await fetch('/orders/get/', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json;charset=utf-8'},
                        body: JSON.stringify({
                            session_id: session_id
                        })
                    });
                    const answer = await response.json();
                    console.log(answer);
                    document.getElementById('cartCount').innerText = answer.count;
                }
            )();

        });

    });
</script>
