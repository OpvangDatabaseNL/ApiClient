<?php
namespace OpvangDatabaseNL\APIclient\models;

class InspectionReport
{
    protected $publishDate;
    protected $link;

    public function load($data) {
        $this->publishDate = $data->publishDate;
        $this->link = $data->link;
    }

    /**
     * @return mixed
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }


}