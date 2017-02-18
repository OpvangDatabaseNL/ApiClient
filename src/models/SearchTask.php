<?php
/**
 * Created by PhpStorm.
 * User: rutgerkirkels
 * Date: 18-02-17
 * Time: 14:41
 */

namespace OpvangDatabaseNL\APIclient\models;


class SearchTask
{
    protected $fields = ['id' => null,'address' => null,'city' => null,'postalcode' => null,'name' => null,'type' => null];

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