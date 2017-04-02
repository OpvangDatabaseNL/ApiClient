<?php

namespace OpvangDatabaseNL\APIclient\models;


class Video
{
    protected $provider;
    protected $url;

    public function load($data) {
        $this->provider = $data->provider;
        $this->url = $data->url;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }


}