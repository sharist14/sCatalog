<?php include_once(ROOT . '/views/user/header.php');      ?>

<div class="register">
    <div class = "register_form">
        <div class="register_header"><h1 class="title">Авторизация</h1></div>
        <div class="register_body">
            <div class="register_table">
                <form action = "#" method = "POST" id="form_auth"></form>
                <table width="300">
                    <tr>
                        <td>email: </td>
                        <td><input type = "text" name = "email" form="form_auth"></td>
                    </tr>
                    <tr>
                        <td>password: </td>
                        <td><input type = "password" name = "password" form="form_auth"></td>
                    </tr>
                    <tr>
                        <td align = 'center' colspan="2" height="10"><h5>Нет учетной записи? Пройди <br/><a href = "/register">регистрацию</a></h5></td>
                    </tr>
                    <tr>
                        <td align = 'center' colspan="2"><input type = "submit" name = "auth" value="" form="form_auth" class = "register_auth"></td>
                    </tr>
                </table>
            </div>
            <br/>
            <?php
                if(isset($errors)){
                    foreach($errors as $fieldNames => $array) {
                        foreach ($array as $error) {
                            echo "<h4 class = 'error'>Ошибка в $fieldNames: " . $error . "</h4>";
                        }
                    }
                }
            ?>
        </div>
        </div>
    </div>
</div>

<?php include_once(ROOT . '/views/user/footer.php');      ?>

