<?php

class Site
{
    public static function menuHeader()
    {
        $way = array_shift(explode("/", trim($_SERVER['REQUEST_URI'], "/")));
        return $way;
    }
}