<?php
/**
 * Created by PhpStorm.
 * User: rutgerkirkels
 * Date: 25-03-17
 * Time: 22:08
 */

namespace OpvangDatabaseNL\APIclient\models\Location\Short;

class Gastouderbureau extends Location
{
    protected $lrk;

    /**
     * @return mixed
     */
    public function getLrk()
    {
        return $this->lrk;
    }


}