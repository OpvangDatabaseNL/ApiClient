<?php

namespace OpvangDatabaseNL\APIclient;

class LocationFactory
{
    public static function load($locationData)
    {
        switch ($locationData->type) {

            case 'gastouderopvang':
                $obj = new \OpvangDatabaseNL\APIclient\models\Location\Full\Gastouderopvang();
                $obj->load($locationData);
                break;

            case 'bso':
                $obj = new \OpvangDatabaseNL\APIclient\models\Location\Full\Bso();
                $obj->load($locationData);
                break;

            case 'kinderdagverblijf':
            $obj = new \OpvangDatabaseNL\APIclient\models\Location\Full\Kinderdagverblijf();
            $obj->load($locationData);
            break;

            case 'peuterspeelzaal':
                $obj = new \OpvangDatabaseNL\APIclient\models\Location\Full\Peuterspeelzaal();
                $obj->load($locationData);
                break;

            case 'gastouderbureau':
                $obj = new \OpvangDatabaseNL\APIclient\models\Location\Full\Gastouderbureau();
                $obj->load($locationData);
                break;
        }

        return $obj;
    }

    public static function loadShort($locationData)
    {
        switch ($locationData->type) {

            case 'gastouderopvang':
                $obj = new \OpvangDatabaseNL\APIclient\models\Location\Short\Gastouderopvang();
                $obj->load($locationData);
                break;

            case 'bso':
                $obj = new \OpvangDatabaseNL\APIclient\models\Location\Short\Bso();
                $obj->load($locationData);
                break;

            case 'kinderdagverblijf':
                $obj = new \OpvangDatabaseNL\APIclient\models\Location\Short\Kinderdagverblijf();
                $obj->load($locationData);
                break;

            case 'peuterspeelzaal':
                $obj = new \OpvangDatabaseNL\APIclient\models\Location\Short\Peuterspeelzaal();
                $obj->load($locationData);
                break;

            case 'gastouderbureau':
                $obj = new \OpvangDatabaseNL\APIclient\models\Location\Short\Gastouderbureau();
                $obj->load($locationData);
                break;
        }

        return $obj;
    }
}