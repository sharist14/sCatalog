<?php include_once(ROOT . '/views/user/header.php');      ?>

        <div class="register">
            <div class = "register_form">
                <div class="register_header"><h1 class="title">Регистрация</h1></div>
                <div class="register_body">
                    <?php
                        if(isset($register_status)): echo "<h2 class = 'register_success'>Вы успешно зарегистрированы.<br/> Обратитесь к администратору для активации Вашей учётной записи</h2>";

                        else:
                    ?>
                    <div class="register_table">
                        <form action = "#" method = "POST" id="form_register"></form>
                        <table width="300">
                            <tr>
                                <td>email: </td>
                                <td><input type = "mail" name = "email" form="form_register" value = "<?php echo $email;  ?>"></td>
                            </tr>                                                                                   
                            <tr>
                                <td>password: </td>
                                <td><input type = "password" name = "password" form="form_register"></td>
                            </tr>
                            <tr>
                                <td>repeat password: </td>
                                <td><input type = "password" name = "rpassword" form="form_register"></td>
                            </tr>
                            <tr>
                                <td>name: </td>
                                <td><input type = "text" name = "name" form="form_register" value = "<?php echo $ccmsId;  ?>"></td>
                            </tr> 
                            <tr>
                                <td align = 'center' colspan="2" height="10"><h5>Есть учетная запись? Пройди <br/><a href = "/auth">авторизацию</a></h5></td>
                            </tr>
                            <tr>
                                <td align = 'center' colspan="2">
                                    <input type = "submit" name = "register" form="form_register" class = "register_register" value="">
                                </td>
                            </tr>      
                            
                        </table>
                    </div>
                    <br/>
                    <?php if(isset($errors)){
                        foreach($errors as $fieldNames => $array){
                            foreach($array as $error){
                                echo "<h4 class = 'error'>Ошибка в $fieldNames: " . $error . "</h4>";
                            }
                        }
                    }

                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>



<?php include_once(ROOT . '/views/user/footer.php');      ?>

