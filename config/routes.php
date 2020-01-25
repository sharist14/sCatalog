<?php
    return array(
        "equip/create" => "equip/create",

        "equip/delete/([a-zA-Z]+)/+" => "equip/delete/$1/$2",

        "equip/edit/(([a-zA-Z]{2,3})([0-9]{2,3})-([0-9]{4}))" => "equip/edit/$1",

        "equip/([a-zA-Z]{1,15})/(([a-zA-Z]{2,3})([0-9]{2,3})-([0-9]{4}))" => "equip/index/$1/$2",

        "equip/([a-zA_Z]{1,15})/page_([0-9]+)" => "equip/category/$1/$2",

        "equip/([a-zA-Z]{1,15})" => "equip/category/$1",

        "register" => "user/register",

        "user/logout" => "user/logout",

        "auth" => "user/authentication",

        "cabinet" => "cabinet/index",

        "" => "site/main",
    );

?>

