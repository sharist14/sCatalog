<?php include_once(ROOT . '/views/layers/header.php');      ?>

        <div class="content">
            <div class="content_bg">
                <div class="mainbar">
                    <p class="post-data"><span class="date">Поступилo: <?php echo $equip['dateCR']; ?> </span> &nbsp;|&nbsp; <span class="date">Изменёнo: <?php echo $equip['dateMO']; ?> </span> &nbsp;|&nbsp; Кем измененo: <?php echo $equip['whoMO']; ?>  |  <a href="/equip/edit/<?php echo $equip['id']; ?>">Edit</a> | <a href="/equip/delete/<?php echo $equip['type']; ?>/<?php echo $equip['inv_nomer']; ?>">Delete</a> </p>
                    <div class="table_equip">
                        <table class="table_single_equip">
                            <form action="#" method="POST" id="form_edit"></form>
                            <caption>Карточка оборудования</caption>
                            <tr>
                                <td>Инв. номер</td>
                                <td class="table_single_equip_color"><input type="text" name="inv_nomer" form="form_edit" placeholder=<?php echo ($equip['inv_nomer'])? $equip['inv_nomer'] : "-"; ?>></td>
                            </tr>
                            <tr>
                                <td>Модель</td>
                                <td class="table_single_equip_color"><input type="text" name="model" form="form_edit" placeholder=<?php echo ($equip['model'])? $equip['model'] : "-"; ?>></td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td class="table_single_equip_color"><input type="text" name="name" form="form_edit" placeholder=<?php echo ($equip['name'])? $equip['name'] : "-"; ?>></td>
                            </tr>
                            <tr>
                                <td>Серийный</td>
                                <td class="table_single_equip_color"><input type="text" name="serial" form="form_edit" placeholder=<?php echo ($equip['serial'])? $equip['serial'] : "-"; ?>></td>
                            </tr>
                            <tr>
                                <td>MAC адрес</td>
                                <td class="table_single_equip_color"><input type="text" name="mac" form="form_edit" placeholder=<?php echo ($equip['mac'])? $equip['mac'] : "-"; ?>></td>
                            </tr>
                            <tr>
                                <td>Стат. IP</td>
                                <td class="table_single_equip_color"><input type="text" name="staticIP" form="form_edit" placeholder=<?php echo ($equip['staticIP'])? $equip['staticIP'] : "-"; ?>></td>
                            </tr>
                            <tr>
                                <td>Статус</td>
                                <?php echo ($equip['active'] == 1) ? "<td class = 'table_single_equip_active'>активно</td>" : "<td class = 'table_single_equip_noactive'>не активно</td>"; ?>
                            </tr>
                            <tr>
                                <td>Комментарий</td>
                                <td class="table_single_equip_color"><input type="text" name="comment" form="form_edit" placeholder=<?php echo ($equip['comment'])? $equip['comment'] : "-"; ?>></td>
                            </tr>
                            <tr>
                                <td><input type = "submit" name="edit" value="Отправить" form="form_edit"></td>
                            </tr>                            
                        </table>
                    </div>

                    <br/><br/>

                    <div class="table_equip_addinfo">
                        <table class="table_single_equip">
                            <caption>Расположено</caption>
                            <tr>
                                <td>Проект</td>
                                <td class="table_single_equip_color"><?php echo ($equip['workflow_id'])? $equip['workflow_id'] : "-"; ?></td>
                            </tr>
                            <tr>
                                <td>Рабочее место</td>
                                <td class="table_single_equip_color"><?php echo ($equip['project_id'])? $equip['project_id'] : "-"; ?></td>
                            </tr>
                        </table>
                    </div>
                    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
                </div>


    <?php include_once(ROOT . '/views/equip/sidebar_menu.php');    ?>
<?php include_once(ROOT . '/views/layers/footer.php');    ?>