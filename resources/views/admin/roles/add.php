<?php
include_once VIEWS.'/includes/admin/header.php';
?>
        <main>
            <h1><?= $title;?></h1>
        </main>

<article class='large'>
        <h1>Добавить новню роль</h1>
        <form action="#" method="post">
            <p>Название роли</p>
            <input required type="text" name="name">
            <input type=submit name="submit" value="Сохранить">
        </form>
</article>

<?php
include_once VIEWS.'/includes/admin/footer.php';

