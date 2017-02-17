<?php


namespace OpvangDatabaseNL\APIclient;
use OpvangDatabaseNL\APIclient\Connector;

class Client
{
    protected $connector = null;

    public function __construct($apiKey = null)
    {
        $this->apiKey = $apiKey;
    }

    public function getLocation($locationId) {
        $this->connector = Connector::class;
    }
}