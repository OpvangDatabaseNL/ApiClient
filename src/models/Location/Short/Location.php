<?php

namespace OpvangDatabaseNL\APIclient\models\Location\Short;


use OpvangDatabaseNL\APIclient\Helper;

class Location
{
    protected $id;
    protected $name;
    protected $address;
    protected $postalCode;
    protected $city;
    protected $latitude;
    protected $longitude;
    protected $registerStart;
    protected $registerEnd;
    protected $municipality;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getRegisterStart()
    {
        return $this->registerStart;
    }

    /**
     * @param mixed $registerStart
     */
    public function setRegisterStart($registerStart)
    {
        $this->registerStart = $registerStart;
    }

    /**
     * @return mixed
     */
    public function getRegisterEnd()
    {
        return $this->registerEnd;
    }

    /**
     * @param mixed $registerEnd
     */
    public function setRegisterEnd($registerEnd)
    {
        $this->registerEnd = $registerEnd;
    }

    /**
     * @return mixed
     */
    public function getMunicipality()
    {
        return $this->municipality;
    }

    /**
     * @param mixed $municipality
     */
    public function setMunicipality($municipality)
    {
        $this->municipality = $municipality;
    }

    public function load($data) {
        foreach(get_object_vars($data) as $key => $val) {
            $key = Helper::camelize($key);
            if (property_exists($this, $key)) {
                $this->$key = $val;
            }
        };
    }

    public function isActive() {
        if (!empty($this->registerEnd)) {
            return false;
        }
        return true;
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
}