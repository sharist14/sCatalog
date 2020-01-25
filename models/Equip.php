<?php

class Equip
{
    const COUNTEQUIP = 5;

    // массив с 1 оборудованнием
    public static function getOneEquipById($inv_nomer)
    {
        $db = Db::getConnect();
        $result = $db->query("SELECT * FROM equip where inv_nomer = '$inv_nomer'");

        $equip = $result->fetch_assoc();

        return $equip;
    }

    // массив с оборудованиями
    public static function getListAllEquip($countEq = self::COUNTEQUIP)
    {

        $db = Db::getConnect();
        $result = $db->query("SELECT * FROM equip ORDER BY dateMO DESC LIMIT $countEq");

        $i = 0;
        while($row = $result->fetch_assoc()){
            $equips[$i]['id'] = $row['id'];
            $equips[$i]['inv_nomer'] = $row['inv_nomer'];
            $equips[$i]['type'] = $row['type'];
            $equips[$i]['model'] = $row['model'];
            $equips[$i]['dateCR'] = $row['dateCR'];
            $equips[$i]['dateMO'] = $row['dateMO'];
            $equips[$i]['whoMO'] = $row['whoMO'];
            $equips[$i]['comment'] = $row['comment'];
            $i++;
        }
        return $equips;
    }


    // данные по определенному типу оборудования
    public static function getListEquipByCategory($category, $page, $countEq)
    {

        $countEq = intval($countEq);

        $offset = ($page - 1) * $countEq;

        $db = Db::getConnect();
        $result = $db->query("SELECT * FROM equip WHERE type = '$category' ORDER BY dateMO DESC LIMIT $countEq OFFSET $offset");

        while($row = $result->fetch_assoc()){
            $equips[] = $row;
        }
        return $equips;
    }

    // Количество оборудования в категории
    public static function getTotalEquipInCategory($category)
    {
        $db = Db::getConnect();

        $result = $db->query("SELECT count(id) AS count FROM equip WHERE type = '$category'");

        $row = $result->fetch_assoc();

        return $row['count'];
    }

    // Массив категорий оборудования
    public static function getTypesEquip()
    {
        $db = Db::getConnect();

        $result = $db->query("SELECT type FROM equip GROUP BY type");

        while($row = $result->fetch_assoc()){
            $types[] = $row;
        }

        return $types;
    }

    // добавление нового оборудования
    public static function create($type='', $inv_nomer='', $model='', $name='', $serial='', $mac='', $staticIP='', $active='', $comment='')
    {

        $db = Db::getConnect();

        $result = $db->query("INSERT INTO equip(`type`, `inv_nomer`, `model`, `name`, `serial`, `mac`, `staticIP`, `active`, `comment`, `dateCR`, `dateMO`, `whoMO`)
                                    VALUES('$type', '$inv_nomer', '$model', '$name', '$serial', '$mac', '$staticIP', '$active', '$comment', NOW(), NOW(), '{$_SESSION['user']}')");


    }

    // преобразование типа даты в удобный для просмотра вид
    public static function changeTypeDate($datetime){
        return (!empty($datetime))? date('d.m.Y H:i', strtotime($datetime)): null;

    }

    // удаление оборудования из БД
    public static function delete($inv_nomer)
    {
        $db = DB::getConnect();
        $result = $db->query("DELETE FROM equip WHERE inv_nomer = '$inv_nomer'");

        return ($result)? TRUE : FALSE;

    }


}



?>