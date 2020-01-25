<?php include_once(ROOT . '/views/layers/header.php');      ?>

    <div class="content">
    <div class="content_bg">
    <div class="mainbar">

        <?php
            if($no_error == TRUE):
                echo "<h1 class='register_success'>Оборудование добавлено</h1>";
        ?>
            <script>setTimeout("location.href='/equip/create/'", 1300); </script>
            
            <?php
            else:

                if(isset($errors)){
                    foreach($errors as $fieldNames => $array) {
                        foreach ($array as $error) {
                            echo "<h4 class = 'error'>Ошибка в $fieldNames: " . $error . "</h4>";
                        }
                    }
                }
            ?>

            <div class="table_equip">
                <form action = "#" method = "POST" id="form_createequip">
                <table class="table_single_equip" width="100%">
                    <caption>Карточка нового оборудования</caption>
                    <tr>
                        <td>*Тип</td>
                        <td>
                            <select class="create_equip_input" name = "type" required>
                                <option value = "" disabled hidden selected>Выбрать...</option>
                                <?php foreach($types as $arr): foreach($arr as $curr_type):  ?>
                                    <option <?php echo ($type == $curr_type)? "selected" : null; ?>><?php echo $curr_type; ?></option>
                                <?php endforeach; endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>*Инв. номер</td>
                        <td><input type = "text" name="inv_nomer" form="form_createequip" class="create_equip_input" value = '<?php echo $inv_nomer; ?>' required></td>
                    </tr>
                    <tr>
                        <td>*Модель</td>
                        <td><input type = "text" name="model" form="form_createequip" class="create_equip_input" value = '<?php echo $model; ?>' required></td>
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td><input type = "text" name="name" form="form_createequip" class="create_equip_input" value = '<?php echo $name; ?>'></td>
                    </tr>
                    <tr>
                        <td>Серийный</td>
                        <td><input type = "text" name="serial" form="form_createequip" class="create_equip_input" value = '<?php echo $serial; ?>'></td>
                    </tr>
                    <tr>
                        <td>MAC адрес</td>
                        <td><input type = "text" name="mac" form="form_createequip" class="create_equip_input" value = '<?php echo $mac; ?>'></td>
                    </tr>
                    <tr>
                        <td>Стат. IP</td>
                        <td><input type = "text" name="staticIP" form="form_createequip" class="create_equip_input" value = '<?php echo $staticIP; ?>'></td>
                    </tr>
                    <tr>
                        <td>Статус</td>
                        <td>
                            <select class="create_equip_input" form="form_createequip" name="active">
                                <option value = '1' <?php echo ($active == "1")? "selected" : null; ?>>active</option>
                                <option value = '0' <?php echo ($active == "0")? "selected" : null; ?>>no active</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Комментарий</td>
                        <td>
                            <textarea rows = 7 cols = 54 form="form_createequip" name="comment"><?php echo $comment; ?></textarea>
                        </td>
                    </tr>
                </table>

                    <div class = "div_align_center"><input type = "submit" name = "submit_create_equip" value="" form="form_createequip" class = "create_equip_submit"></div>
            </div>

            <br/><br/>

            <div class="table_equip_addinfo">
                <table class="table_single_equip">
                    <caption>Расположено</caption>
                    <tr>
                        <td>Проект</td>
                        <td class="table_single_equip_color"></td>
                    </tr>
                    <tr>
                        <td>Рабочее место</td>
                        <td class="table_single_equip_color"></td>
                    </tr>
                </table>
            </div>
            <div class = "div_align_center"><input type = "submit" name = "submit_workplace_equip" value="" form="form_createequip" class = "create_equip_submit"></div>

            <br/><br/><br/><br/><br/><br/><br/><br/><br/>

        <?php endif; ?>

    </div>




<?php include_once(ROOT . '/views/equip/sidebar_menu.php');    ?>
<?php include_once(ROOT . '/views/layers/footer.php');    ?>