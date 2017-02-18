<?php

namespace OpvangDatabaseNL\APIclient\models;


class ApiResponse
{
    protected $body = null;
    protected $returnCode = null;

    public function __construct($body = null, $returnCode = null)
    {
        if (!empty($body)) {
            $this->body = $body;
        }

        if (!empty($returnCode)) {
            $this->returnCode = $returnCode;
        }

    }

    public function getBody() {
        return json_decode($this->body);
    }
}