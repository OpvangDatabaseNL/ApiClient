<?php

namespace OpvangDatabaseNL\APIclient\models\Location\Full;

use OpvangDatabaseNL\APIclient\Client;
use OpvangDatabaseNL\APIclient\Connector;
use OpvangDatabaseNL\APIclient\LocationFactory;

class Gastouderopvang extends Location
{
    protected $lrkId = null;
    protected $slots = null;

    public function getRelations() {
        if (empty($this->id)) {
            return false;
        }

        $message = new ApiMessage();
        $message->setEndPoint('relations');
        $message->setId($this->id);

        $call = new Connector(Client::init()->apiKey);
        $call->setMessage($message);
        if ($call->execute()) {
            $locations = [];

            foreach($call->getResponse()->getBody() as $locationData) {
                $locations[] = LocationFactory::load($locationData);
            }
            return $locations;
        }
        return [];
    }

}