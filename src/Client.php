<?php


namespace OpvangDatabaseNL\APIclient;
use OpvangDatabaseNL\APIclient\Connector;
use OpvangDatabaseNL\APIclient\models\ApiResponse;
use OpvangDatabaseNL\APIclient\models\Location;
use OpvangDatabaseNL\APIclient\models\ResponseOrder;
use OpvangDatabaseNL\APIclient\models\SearchTask;

define('VERSION', '1.0.0');

class Client
{
    protected $connector = null;
    protected $message = null;
    public $apiKey = null;
    private static $instance = null;

    public static function init($apiKey = NULL)
    {
        $class = get_class(self::$instance);
        if (!self::$instance)
        {
            self::$instance = new $class($apiKey);
        }
        return self::$instance;
    }

    public function __construct($apiKey = null)
    {
        $this->apiKey = $apiKey;
        $this->connector = new Connector($apiKey);
        $this->message = new \OpvangDatabaseNL\APIclient\models\ApiMessage();
    }


    public function getLocation($locationId) {
        $this->message->setEndPoint('locations');
        $this->message->setId($locationId);
        $this->connector->setMessage($this->message);
        if ($this->connector->execute()) {
            $location = LocationFactory::load($this->connector->getResponse()->getBody());
            return $location;
        }
        return false;
    }

    public function getNewestLocations($max = 10, ResponseOrder $order = null) {
        $this->message->setEndPoint('locations/newest/'.$max);

        if (!empty($order)) {
            $this->message->setData('orderBy',$order->getField());
            $this->message->setData('order', $order->getOrder());
        }

        $this->connector->setMessage($this->message);

        if ($this->connector->execute()) {
            $locations = [];
            foreach($this->connector->getResponse()->getBody() as $locationData) {

                $locations[] = LocationFactory::loadShort($locationData);
            }

            return $locations;
        }

        return false;
    }

    public function search(SearchTask $searchTask, ResponseOrder $order = null) {
        $searchParams = [];
        foreach ($searchTask->getSearchParameters() as $searchParameter => $value) {
            if (!empty($value)) {
                $searchParams[$searchParameter] = $value;
            }
        }
        if (count($searchParams) === 0) {
            return false;
        }

        $this->message->setEndPoint('search/locations');

        if (!empty($order)) {
            $this->message->setData('orderBy',$order->getField());
            $this->message->setData('order', $order->getOrder());
        }

        if (count($searchParams) > 0) {
            foreach ($searchParams as $name => $value) {
                $this->message->setData($name, $value);
            }
        }
        $this->connector->setMessage($this->message);
        if ($this->connector->execute()) {
            $locations = [];

            foreach($this->connector->getResponse()->getBody() as $locationData) {

                $locations[] = LocationFactory::loadShort($locationData);
            }
            return $locations;
        }
        return false;
    }

    public function getCities() {
        $this->message->setEndPoint('cities');
        $this->connector->setMessage($this->message);
        $cities = [];
        if ($this->connector->execute()) {
            foreach($this->connector->getResponse()->getBody() as $city) {
                $cities[] = $city;
            }
        }
        return $cities;
    }

    public function getLocationByTypeAndCity($type, $city) {
        $this->message->setEndPoint('cities/' . $city . '/' . $type);
        $this->connector->setMessage($this->message);
        $locations = [];
        if ($this->connector->execute()) {
            foreach($this->connector->getResponse()->getBody() as $locationData) {
                $location = new Location\Short\Location();
                $location->load($locationData);
                $locations[] = $location;
            }
            return $locations;
        }
        return false;
    }

    public function getDataFromEndpoint($endPoint) {
        $this->message->setEndPoint($endPoint);
        $this->connector->setMessage($this->message);
        $data=[];
        if ($this->connector->execute()) {
            foreach($this->connector->getResponse()->getBody() as $receivedData) {
                $data[] = $receivedData;
            }
            return $data;
        }
        return false;
    }
}