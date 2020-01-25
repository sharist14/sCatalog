<?php


class Errors
{
    public static function checkHack($str){
        $str = trim($str, ' ');                                     // убираем пробелы
        $str = get_magic_quotes_gpc()? stripslashes($str) : $str;         // удаляем экранированные символы
        $str = strip_tags($str);                                          // удаляем php и html теги
        $str = htmlspecialchars($str);                                    // преобразуем html символы в спец сущности
        return $str;
    }

    public static function checkLenght($str, $min, $max){
        if($str < $max AND $str > $min){
            return TRUE;
        } else{
            return FALSE;
        }
    }

    // проверяем на уникальность инвернтарного номера
    public static function checkInvNomerUniq($inv_nomer){
        $db = Db::getConnect();
        $query = $db->query("SELECT * FROM equip WHERE inv_nomer = '$inv_nomer'");
        $row = $query->fetch_array();
        return ($row)? TRUE : FALSE;
    }

    public static function checkFormCreateEquip($data){
        $error = array();

        $type = self::checkHack($data['type']);
        $inv_nomer = mb_strtoupper(self::checkHack($data['inv_nomer']));
        $model = self::checkHack($data['model']);
        $name = mb_strtoupper(self::checkHack($data['name']));
        $serial = self::checkHack($data['serial']);
        $mac = self::checkHack($data['mac']);
        $staticIP = self::checkHack($data['staticIP']);
        $active = self::checkHack($data['active']);
        $comment = self::checkHack($data['comment']);


        // проверка инвентарного номера
        $template = "~(([a-zA-Z]{2,3})([0-9]{2,4})-([0-9]{4}))~";
        (!preg_match($template, $inv_nomer))? $error['инв. номер']['некорректный'] = "некорректный формат инвентарного номера" : null;
        (self::checkInvNomerUniq($inv_nomer))? $error['инв. номер']['уникальный'] = "данный инв. номер уже используется" : null;


        if(!empty($error)){
            return $error;
        } else {
            Equip::create($type, $inv_nomer, $model, $name, $serial, $mac, $staticIP, $active, $comment);
        }
    }
}