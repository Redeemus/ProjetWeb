<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class WorkoutTable extends Table {
    
    public function addWorkout($d, $ed, $s) {
        $n = $this->newEntity();
        $n -> date = $d;
        $n -> end_date= $ed;
        $n -> sport = $ $s;
        $this->save($n);
    }
    
    public function editWo($id, $d, $ed, $s) {
        $n = $this->set('id');
        $n -> date = $d;
        $n -> end_date= $ed;
        $n -> sport = $ $s;
    }
    
}
