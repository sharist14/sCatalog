<?php

class UserController
{
    // Аутентификация
    public function actionAuthentication()
    {
        (isset($_SESSION['user']))? header("Location: /") : NULL;

        if(isset($_POST['auth'])){
            $email = trim($_POST['email'], " ");
            $password = trim($_POST['password'], " ");

            $errors = User::checkCorrectDataFormLogin($_POST);

            if(!$errors) {
                $user = User::checkUserInDbAuth($email, $password);                

                if($user){                    
                    $_SESSION['user'] = $user['email'];
                    header("Location: /");
                }
            }
        }

        
        include(ROOT . '/views/user/auth.php');
    }

    // Logout
    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /auth");

    }

    // Регистрация
    public function actionRegister()
    {
        (isset($_SESSION['user']))? header("Location: /") : NULL;

        $ccmsId = "";
        $filial = "";
        $department = "";
        $email = "";
        $name = "";

        if(isset($_POST['register'])) {            
            $email = trim($_POST['email'], ' ');
            $name = trim($_POST['name'], ' ');
            $password = trim($_POST['password'], ' ');
            $rpassword = trim($_POST['password'], ' ');
            
            $check = new User;
            $errors = $check->checkCorrectDataFormRegister($_POST);

            if (!$errors) {
                $register_status = User::registerUser($name, $email, $password);
            }
        }

        include(ROOT . '/views/user/register.php');
    }




}





?>