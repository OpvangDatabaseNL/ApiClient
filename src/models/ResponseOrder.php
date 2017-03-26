<?php

namespace OpvangDatabaseNL\APIclient\models;


class ResponseOrder
{
    protected $field;
    protected $order;

    /**
     * @param mixed $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    public function setOrderAscending()
    {
        $this->order = 'ASC';
    }

    public function setOrderDescending()
    {
        $this->order = 'DESC';
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }


}