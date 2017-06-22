<?php
include_once VIEWS.'/includes/head.php';
include_once VIEWS.'/includes/header.php';
?>

        <main>
            <?php if($data['res']):?>
                <h4 id="edit_thanks">Данные успешно изменены!</h4>
                <h3 id="to_cabinet">Вернуться в <a href="/profile" id="reg_main_a">Кабинет</a></h3>
            <?php else: ?>

            <?php if (isset($data['errors']) && is_array($data['errors'])):?>
                <ul class="errors">
                    <?php foreach($data['errors'] as $error):?>
                        <li> - <?php echo $error;?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>

        <h1><?= $title;?></h1>

            <form action="#" method="post" id="edit_form">
                <h2>Редактирование данных</h2>
                <p>Имя</p>
                <input required type="text" name="name" value="<?= $data['user']['name'] ?>">
                <p>Пароль</p>
                <input required type="password" name="password" value="<?= $data['user']['password'] ?>">
                <input type=submit name="submit" value="Сохранить" id="save_btn">
            </form>
        <?php endif;?>
            
        </main>

<?php

include_once VIEWS.'/includes/footer.php';
