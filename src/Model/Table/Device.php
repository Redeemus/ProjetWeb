<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class DeviceTable extends Table {

    public function addDevice($s, $des) {
        $n = $this->newEntity();
        $n -> serial = $s;
        $n -> description= $des;
        $this->save($n);
    }
    
}
