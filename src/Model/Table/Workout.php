<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class WorkoutTable extends Table {
    
    public function newworkout($id, $d, $ed, $l, $des, $s) {
        $workoutTable = TableRegistry::get('Workouts');
        $n = $workoutTable->newEntity();
        $n -> member_id = $id;
        $n -> date = $d("Y-m-d h:i:s");
        $n -> end_date= $ed;
        $n -> location_name = $l;
        $n -> description = $des;
        $n -> sport = $s;
        $n -> contest_id = NULL;
        pr($n);
        $workoutTable->save($n);
    }
    
    public function getAllWorkouts($member_id){
        $workoutTable = TableRegistry::get('Workouts');
        $workouts = $workoutTable->find('all')->where(['Workout.member_id' => $member_id]);
        foreach ($workouts as $key => $value) {
                    $workoutDisplay[] = $value; 
        }
        return $workoutDisplay;
    }
    
    public function editWo($id, $d, $ed, $s) {
        $n = $this->set('id');
        $n -> date = $d;
        $n -> end_date= $ed;
        $n -> sport = $ $s;
    }
    
}
