<?php include_once(ROOT . '/views/layers/header.php');      ?>

    <div class="content">
    <div class="content_bg">
    <div class="mainbar">

        <?php
            if($result == TRUE):
                echo "<h1 class='register_success'>Оборудование удалено</h1>";
        ?>
            <script>setTimeout("location.href='/'", 1300); </script>
            
        <?php
            else:
        ?>
            <div class="center"> <h1 class='result_false'>Вы уверены что хотите удалить оборудование?</h1> </div>
            <br/>
            <div class="center">
                <form action="#" method="POST">
                    <input type = "submit" value = "" name = "yes" class="yes_button">
                    <input type="submit" value="" name="no" class="no_button">
                </form>
            </div>

            <br/><br/>

            <br/><br/><br/><br/><br/><br/><br/><br/><br/>

        <?php endif; ?>

    </div>




<?php include_once(ROOT . '/views/equip/sidebar_menu.php');    ?>
<?php include_once(ROOT . '/views/layers/footer.php');    ?>