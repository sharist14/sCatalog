<?php

class User
{
    // проверка залогинен ли пользователь
    public static function checkLogIn()
    {
        if(!isset($_SESSION['user'])){
            header("Location: /auth");
        }
    }


    // проверка на наличие ошибок при авторизации
    public static function checkCorrectDataFormLogin($data)
    {
        $error = array();

        $email = trim($_POST['email'], " ");
        $password = trim($_POST['password'], " ");

        if(empty($email) || empty($password)){
            $error['данных']['empty'] = "все поля обязательны для заполнения";
        } else {
            if(!self::checkUserInDbAuth($email, $password)) {
                $error['данных']['uniqueUser'] = "Пользователь с указанными данными не найден";
            } elseif(!self::checkUserActiveStatus($email)) {
                $error['данных']['active'] = "Ваша учетная запись не активна, обратитесь к администратору";
            }
        }

        return $error;
    }

    // проверка на существование пользователя в БД и корректный пароль
    public static function checkUserInDbAuth($email, $password)
    {
        $conn = Db::getConnect();
        $query = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = SHA1('$password')");
        $row = $query->fetch_assoc();

        return ($row)? $row : FALSE;
    }

    // проверка наличия активной УЗ у имеющегося пользователя
    public static function checkUserActiveStatus($email){
        $conn = Db::getConnect();
        $query = $conn->query("SELECT * FROM users WHERE email = '$email' AND active = '1'");
        $row = $query->fetch_array();

        return ($row)? TRUE : FALSE;
    }



    public function checkCorrectDataFormRegister($data)
    {        
        $name = trim($_POST['name'], ' ');
        $email = trim($_POST['email'], ' ');
        $password = trim($_POST['password'], ' ');
        $rpassword = trim($_POST['rpassword'], ' ');

        if(empty($data['email']) || empty($data['name']) || empty($data['password']) || empty($data['rpassword'])){
            $error['данных']['empty'] = "все поля обязательны для заполнения";
        }
        else{         

            ($this->checkEmailInDb($email))? $error['domain name']['uniqueUser'] = "Пользователь с таким именем уже существует" : NULL;           

            (mb_strlen($name, $encoding="utf-8")<2)? $error['name']['lenght_min'] = "имя слишком короткое" : NULL;
            (mb_strlen($name, $encoding="utf-8")>40)? $error['name']['max'] = "имя слишком длинное" : NULL;

            $pattern = "~[a-z0-9]+@[a-z]+\.[a-z]+~";
            (!preg_match($pattern,$email))? $error['email']['error_format'] = "проверьте правильность указанной почты" : NULL;

            (mb_strlen($password) < 6)? $error['ccmsId']['lenght_min'] = "введите пароль не менее 6 символов" : NULL;

            ($password != $rpassword)? $error['repeat_password']['not_match'] = "пароли должны совпадать" : NULL;

        }


        return $error;
    }
    

    public static function checkEmailInDb($email)
    {
        $conn = Db::getConnect();
        $query = $conn->query("SELECT * FROM users WHERE email = '$email'");
        $row = $query->fetch_row();
        return ($row)? TRUE : FALSE;
    }

    // регистрируем пользователя
    public static function registerUser($name, $email, $password){
        $conn = Db::getConnect();
        $query = $conn->query("INSERT INTO users(`name`, `password`, `email`, `date`) 
                                     VALUES('$name', SHA1('$password'), '$email', NOW())");
        return TRUE;
    }


}


?>