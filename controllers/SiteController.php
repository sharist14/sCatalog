<?php

class SiteController
{

    // главная страница
    public function actionMain()
    {
        $way = Site::menuHeader();

        $equips = Equip::getListAllEquip(5);



        include(ROOT . '/views/site/index.php');
    }
}

?>