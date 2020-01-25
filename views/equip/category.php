<?php include_once(ROOT . '/views/layers/header.php');  ?>



    <div class="content">
    <div class="content_bg">
    <div class="mainbar">
        <div class="article">
            <h1 class="title">Последние изменения</h1>
        </div>        
        <?php foreach($equips as $equip): ?>
            <div class="article">
                <h2><span><?php echo $equip['inv_nomer'] . ":&nbsp;&nbsp; " . $equip['model'];  ?></span></h2>
                <div class="clr"></div>
                <p class="post-data">
                    <span class="date">Поступило: <span class="bold"><?php echo Equip::changeTypeDate($equip['dateCR']); ?></span></span>
                    &nbsp;|&nbsp;
                    <span class="date">Изменёно: <span class="bold"><?php echo Equip::changeTypeDate($equip['dateMO']); ?> </span></span>
                    &nbsp;|&nbsp;
                    Кем изменено: <span class="bold"><?php echo $equip['whoMO']; ?></span>
                    |
                    <a href="/equip/<?php echo $equip['type']; ?>/<?php echo $equip['inv_nomer'];  ?>">Подробнее...</a>
                </p>
                <img src="/template/images/no_images.png" width="145" height="118" alt="image" class="fl" />
                <p>Комментарий:<br/>
                    <textarea rows = 7 cols = 54><?php echo $equip['comment']; ?></textarea></p>
                <div class="clr"></div>
            </div>
        <?php endforeach; ?>

        <!-- Page pagination-->
        <?php echo $pagination->get();   ?>
        <!-- End page pagination-->

    </div>


<?php include_once(ROOT . '/views/equip/sidebar_menu.php');    ?>
<?php include_once(ROOT . '/views/layers/footer.php');    ?>