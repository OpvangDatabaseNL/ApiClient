<?php

namespace OpvangDatabaseNL\APIclient;

define('APIHOST', 'api.opvangdatabase.nl');

class Connector
{
    protected $apiKey = null;

    public function __construct($apiKey = null)
    {
        $this->apiKey = $apiKey;
    }

    public static function getInstance($apiKey = NULL)
    {
        $class = get_class(self::$instance);
        if (!self::$instance)
        {
            self::$instance = new $class($apiKey);
        }
        return self::$instance;
    }

    public function setCommand($command) {

    }
}