<?php

namespace OpvangDatabaseNL\APIclient\models;


class ApiMessage
{
    protected $endPoint = null;
    protected $dataSet = null;
    protected $id = null;
    protected $data = [];
    protected $headers = [];

    public function setEndPoint($endPoint) {
        $this->endPoint = $endPoint;
    }

    /**
     * @return null
     */
    public function getDataSet()
    {
        return $this->dataSet;
    }

    /**
     * @param null $dataSet
     */
    public function setDataSet($dataSet)
    {
        $this->dataSet = $dataSet;
    }

    public function getEndPoint() {
        return $this->endPoint;
    }
    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function setData($name, $value) {
        $this->data[$name] = $value;
    }

    public function addHeader($name, $value) {
        $this->headers[$name] = $value;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }



}