<?php


namespace OpvangDatabaseNL\APIclient;


class Helper
{
    public static function camelize($input, $separator = '_')
    {
        return str_replace($separator, '', lcfirst(ucwords($input, $separator)));
    }
}