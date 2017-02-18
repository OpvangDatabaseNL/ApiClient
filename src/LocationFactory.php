<?php

namespace OpvangDatabaseNL\APIclient;


use OpvangDatabaseNL\APIclient\models\Buitenschoolseopvang;
use OpvangDatabaseNL\APIclient\models\Gastouderbureau;
use OpvangDatabaseNL\APIclient\models\GastouderOpvang;
use OpvangDatabaseNL\APIclient\models\Kinderdagverblijf;
use OpvangDatabaseNL\APIclient\models\Peuterspeelzaal;

class LocationFactory
{
    public static function load($locationData)
    {
        switch ($locationData->type) {

            case 'Gastouderopvang':
                $obj = new GastouderOpvang();
                $obj->load($locationData);
                break;

            case 'Buitenschoolse opvang':
                $obj = new Buitenschoolseopvang();
                $obj->load($locationData);
                break;

            case 'Kinderdagverblijf':
            $obj = new Kinderdagverblijf();
            $obj->load($locationData);
            break;

            case 'Peuterspeelzaal':
                $obj = new Peuterspeelzaal();
                $obj->load($locationData);
                break;

            case 'Gastouderbureau':
                $obj = new Gastouderbureau();
                $obj->load($locationData);
                break;
        }

        return $obj;
    }
}