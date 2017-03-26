<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class LogTable extends Table {

    public function addResult($member_id, $workout_id, $device_id, $date, $location_latitude, $location_logitude, $log_type, $log_value) {
        $n = $this->newEntity();
        $n -> member_id = $member_id;
        $n -> workout_id = $workout_id;
        $n -> device_id = $device_id;
        $n -> date = $date;
        $n -> location_latitude = $location_latitude;
        $n -> location_logitude = $location_logitude;
        $n -> log_type  = $log_type;
        $n -> log_value = $log_value;
        $this->save($n);
    }
    
    public function getRanks (){
        $logsTable = TableRegistry::get('Logs');
        $log = $logsTable->find('all')
            ->order(["log_value" => "DESC"])
            ->toArray();
        return $log;
    }
    
    
    
}


