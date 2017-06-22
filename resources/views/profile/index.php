<?php
include_once VIEWS.'/includes/head.php';
include_once VIEWS.'/includes/header.php';
?>
        <main>

        <h1><?= $title;?></h1>

        <h4 id="cabinet_greeting">Привет, <?php echo $data['user']['name']; ?></h4>
        <ul id="cabinet_list">
           <li><a href="/profile/edit">Редактировать персональные данные</a></li>
           <li><a href="/profile/orders">Список покупок</a></li>
        </ul>
            
        </main>

<?php

include_once VIEWS.'/includes/footer.php';
