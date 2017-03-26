<?php

namespace OpvangDatabaseNL\APIclient\models;


class SearchTask
{
    protected $fields = ['id' => null,'address' => null,'city' => null,'postalCode' => null,'name' => null,'type' => null];

    public function addParameter($name, $value) {
        if (key_exists(strtolower($name), $this->fields)) {
            $this->fields[$name] = $value;
            return true;
        }
        return false;
    }

    public function getSearchParameters() {
        return $this->fields;
    }
}