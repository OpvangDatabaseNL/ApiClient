<?php

namespace OpvangDatabaseNL\APIclient\models\Location\Short;


class Bso extends Location
{
    protected $lrk;
    protected $slots;

    /**
     * @return mixed
     */
    public function getLrk()
    {
        return $this->lrk;
    }

    /**
     * @return mixed
     */
    public function getSlots()
    {
        return $this->slots;
    }


}