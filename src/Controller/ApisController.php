<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ApisController extends AppController {
 
    public function registerdevice($compte, $appareil, $description){
    $this->layout='ajax';
    $this->Device->SubscribeNewDevice($compte, $appareil, $description, 1);

     $this->set('posts',$this->Device->id);
      
      
    }
    
    public function workoutparameters($device,$id_seance){
        $this->layout = 'ajax';
        $posts= $this->Log->find('all', array('fields' => 'log_value','conditions' => array('Log.workout_id' => $id_seance, 'Log.device_id' => $device)));
        $this->set(array('content' => $posts));
    }
    
    public function getsummary($serial) {
        $this->layout = 'ajax';
        $device = $this->Device->find('first', array(
            'conditions' => array(
                'Device.serial' => $serial,
                'Device.trusted'=>1
            )
        ));
        if ($device) {
            $workouts = $this->Workout->find('all', array('fields' => 'Workout.description',
                'conditions' => array(
                    'Workout.member_id' => $device['Member']['id']),
                     'order' => array('Workout.end_date DESC'),
                     'limit'=>3,
            ));
            $futurWorkout = $this->Workout->find('first',array('fields' => 'Workout.description',
                'conditions'=>array(
                    'Workout.member_id' => $device['Member']['id'],
                    'Workout.date >=' => date('Y-m-d H:i:s')
                )
            ));
            if (empty($workouts)) {
                $this->set(array('message' => "No workout done"));
            } else {
                $this->set(array('workouts' => $workouts));
                $this->set(array('message' => "Workout found"));
            }
            if($futurWorkout){
                $this->set(array('futurworkout' => $futurWorkout));
                $this->set(array('message' => "Workout found"));
            }else{
                $this->set(array('message' => "No workout done"));
            }
        }
    }
    public function addlog($device,$id,$membre_id,$str=null,$points){
            $this->layout = 'ajax';
            
            $actual_log = $this->Log->find('all', array('fields' => 'Log.log_value','conditions' => array('Log.device_id'=> $device, 'Log.id' => $id, 'Log.member_id' => $membre_id)));
            
            if ($actual_log){
                $this->Log->id = $id;
                $this->Log->saveField('log_value',$actual_log[0]['Log']['log_value'] + $points);
                $this->set(array('message' => "Match modif"));
            }else{
                $this->set(array('message' => "Pas de match correspondant"));
            
            }
            
    }
}