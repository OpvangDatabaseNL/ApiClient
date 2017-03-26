<?php

namespace OpvangDatabaseNL\APIclient\models\Location\Short;


class Peuterspeelzaal extends Location
{
    protected $slots;

    /**
     * @return mixed
     */
    public function getSlots()
    {
        return $this->slots;
    }


}