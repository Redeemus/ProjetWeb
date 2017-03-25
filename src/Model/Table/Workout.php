<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class WorkoutTable extends Table {
    
    public function addworkout($id, $d, $ed, $l,$des, $s) {
        $n = $this->newEntity();
        $n -> id = $id;
        $n -> date = $d;
        $n -> end_date= $ed;
        $n -> location_name = $l;
        $n -> description = $des;
        $n -> sport = $s;
        $this->save($n);
    }
    
    public function editWo($id, $d, $ed, $s) {
        $n = $this->set('id');
        $n -> date = $d;
        $n -> end_date= $ed;
        $n -> sport = $ $s;
    }
    
}
