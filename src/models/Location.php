<?php
/**
 * Created by PhpStorm.
 * User: rutgerkirkels
 * Date: 18-02-17
 * Time: 09:18
 */

namespace OpvangDatabaseNL\APIclient\models;


use OpvangDatabaseNL\APIclient\Client;
use OpvangDatabaseNL\APIclient\Connector;
use OpvangDatabaseNL\APIclient\Helper;

class Location
{
    protected $id = null;
    protected $name = null;
    protected $type = null;
    protected $registerStart = null;
    protected $registerStatus = null;
    protected $municipality = null;
    protected $contactEmail = null;
    protected $contactTelephone = null;
    protected $address = null;
    protected $postalCode = null;
    protected $city = null;
    protected $website = null;
    protected $latitude = null;
    protected $longitude = null;

    public function __construct()
    {

    }

    public function __call($name, $arguments)
    {
        preg_match_all('/get(.*)/', $name, $parts);
        $property = Helper::camelize($parts[1][0]);
        if (property_exists($this,$property)) {
            return $this->$property;
        }
        return false;
    }

    public function load($apiResponse) {
        foreach(get_object_vars($apiResponse) as $key => $val) {
            $key = Helper::camelize($key);
            if (property_exists($this, $key)) {
                $this->$key = $val;
            }
        };

    }

    public function getRegisterStartDate($format = 'd-m-Y') {

        $timestamp = new \DateTime($this->registerStart->date);
        return $timestamp->format($format);
    }


}