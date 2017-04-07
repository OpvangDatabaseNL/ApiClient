<?php

namespace OpvangDatabaseNL\APIclient\models;


class BusinessHours
{
    protected $data;

    public function __construct(array $data = null)
    {
        if (!empty($data)) {
            foreach ($data as $value) {
                $this->data[$value->weekDay] = [
                    'open' => $value->open,
                    'close' => $value->close
                ];
            }
        }
    }

    public function byWeekDay($weekDay) {
        if (isset($this->data[$weekDay])) {
            return $this->data[$weekDay];
        }

        return false;
    }
}