<?php
include_once VIEWS.'/includes/admin/header.php';
?>
        <main>
            <h1><?= $title;?></h1>
        </main>
       

<article class='large'>

        <h1>Добрый день, администратор!</h1>


        <p>Вам доступны такие возможности:</p>

        <ul>
            <li><a target="_blank" href="/admin/product">Products</a></li>
            <li><a target="_blank" href="/admin/category">Управление категориями</a></li>
            <li><a target="_blank" href="/admin/orders">Управление заказами</a></li>
        </ul>

    <div class="appendix"></div>
</article>

<?php

include_once VIEWS.'/includes/admin/footer.php';
