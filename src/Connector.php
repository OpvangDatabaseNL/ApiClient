<?php

namespace OpvangDatabaseNL\APIclient;

use OpvangDatabaseNL\APIclient\models\ApiResponse;

define('APIHOST', 'https://api2.opvangdatabase.nl');

class Connector
{
    protected $apiKey = null;
    protected $apiMessage = null;
    protected static $instance = null;
    protected $connectTimeout = 20;
    protected $response = null;
    protected $numberOfCalls = 0;
    protected $method = 'get';
    protected $queryVars = [];

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

    public function setMessage(\OpvangDatabaseNL\APIclient\models\ApiMessage $apiMessage) {
        $this->apiMessage = $apiMessage;
    }

    public function setQueryVars(array $queryVars) {
        foreach ($queryVars as $key => $value) {
            if (is_array($value)) {
                return false;
            }
            $this->setQueryVar($key, $value);
        }
        return true;
    }

    public function execute() {
        $this->apiMessage->addHeader('apiKey', $this->apiKey);

//        var_dump($this->apiMessage);die;
        $url = APIHOST . '/' . $this->apiMessage->getEndPoint();

        if (!empty($this->apiMessage->getId())) {
            $url .= "/" . $this->apiMessage->getId();
        }

        if (!empty($this->apiMessage->getDataSet())) {
            $url .= '/' . $this->apiMessage->getDataSet();
        }

        if ($this->method === 'get' && count($this->apiMessage->getData()) > 0) {
            $url .= '?' . http_build_query($this->apiMessage->getData());
        }
var_dump($url);
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_TIMEOUT => $this->connectTimeout,
            CURLOPT_HTTPHEADER => $this->apiMessage->getHeaders()
        ));

        $body = curl_exec($ch);
        $this->numberOfCalls += 1;
        $returnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($returnCode !== 200) {
            return false;
        }

        $this->response = new ApiResponse($body, $returnCode);

        return true;
    }

    public function getResponse() {
        return $this->response;
    }

    /**
     * @return int
     */
    public function getNumberOfCalls(): int
    {
        return $this->numberOfCalls;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method)
    {
        $this->method = $method;
    }


}