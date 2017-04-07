<?php

namespace OpvangDatabaseNL\APIclient\models\Location\Full;


use OpvangDatabaseNL\APIclient\Client;
use OpvangDatabaseNL\APIclient\Connector;
use OpvangDatabaseNL\APIclient\Helper;
use OpvangDatabaseNL\APIclient\models\BusinessHours;

class Location
{
    protected $id = null;
    protected $name = null;
    protected $type = null;
    protected $registration;
    protected $municipality = null;
    protected $address = null;
    protected $postalCode = null;
    protected $city = null;
    protected $contact;
    protected $coordinates;
    protected $videos;
    protected $website;
    protected $socialMedia;
    protected $businessHours;

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
        $timestamp = new \DateTime($this->registration->start);
        return $timestamp->format($format);
    }

    public function getRegisterEndDate($format = 'd-m-Y') {
        if (!property_exists($this->registration,'end')) {
            return false;
        } else {
            $timestamp = new \DateTime($this->registration->end);
            return $timestamp->format($format);
        }
    }

    public function hasVideos() {
        if ($this->videos > 0) {
            return true;
        }
        return false;
    }

    public function getBusinessHours() {
        if (empty($this->businessHours)) {
            return false;
        }
        return new BusinessHours($this->businessHours);

    }

}