<?php


class EquipController
{

    // вывод страницы с информацией об одном оборудовании
    public function actionIndex($parameters)
    {

        $way = Site::menuHeader();

        $category = array_shift($parameters);

        $inv_nomer = array_shift($parameters);

        $equip = Equip::getOneEquipById($inv_nomer);

        include(ROOT . '/views/equip/single.php');
    }


    // вывод списка оборудования определенной категории
    public function actionCategory($parameters)
    {
        $way = Site::menuHeader();

        $category = ucfirst(array_shift($parameters));

        $page = ($parameters) ? array_shift($parameters) : 1;

        $equips = Equip::getListEquipByCategory($category, $page, 5);

        $total = Equip::getTotalEquipInCategory($category);

        $pagination = new Pagination($total, $page,Equip::COUNTEQUIP, 'page_');

        include(ROOT . '/views/equip/category.php');

        return true;
    }
    
    // Добавление нового оборудования
    public function actionCreate()
    {
        $type = "";
        $inv_nomer = "";
        $model = "";
        $name = "";
        $serial = "";
        $mac = "";
        $staticIP = "";
        $active = "";
        $comment = "";

        $way = Site::menuHeader();

        $category = array();

        $types = Equip::getTypesEquip();

        $no_error = FALSE;


        if(isset($_POST['submit_create_equip'])){
            $type = $_POST['type'];
            $inv_nomer = $_POST['inv_nomer'];
            $model = $_POST['model'];
            $name = $_POST['name'];
            $serial = $_POST['serial'];
            $mac = $_POST['mac'];
            $staticIP = $_POST['staticIP'];
            $active = $_POST['active'];
            $comment = $_POST['comment'];
            
            $errors = Errors::checkFormCreateEquip($_POST);

            (!$errors)? $no_error = TRUE : FALSE;

        }

        
        include(ROOT . '/views/equip/create_equip.php');
        return true;
    }

    // Удаление оборудования
    public function actionDelete($parameters)
    {
        $way = Site::menuHeader();

        $category = array();

        $result = FALSE;

        if(isset($_POST['yes'])){
            $category = array_shift($parameters);

            $inv_nomer = array_shift($parameters);

            $result = Equip::delete($inv_nomer);
        }

        if(isset($_POST['no'])){
            $this->actionIndex($parameters);
        }


        include(ROOT . '/views/equip/delete.php');
    }
    
    public function actionEdit($parameters)
    {       
        $way = Site::menuHeader();

        $inv_nomer = array_shift($parameters);

        $equip = Equip::getOneEquipById($inv_nomer);          

        include(ROOT . '/views/equip/edit.php');
    }
    
}
?>