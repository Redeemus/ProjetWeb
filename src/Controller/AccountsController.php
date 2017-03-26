<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class AccountsController extends AppController {
    
    public function beforeFilter(Event $event) {
        $actual_id = $this->request->session()->read('Members.email');
    }

    public function index() {
        $this->set('title', "index");
    }

    public function connexion() {
         $this->set('title', 'Login');
		$messageUser="";
		if($this->request->is('post')){
			$data= $this->request->data;
			$this->loadModel('Members');
			$res = $this->Members->find('all')->where(['Members.email' => $data['userName']]);
			$res = $res->first();
			if($res['password'] == $data['password'] AND $res['email'] == $data['userName']){
				$session = $this->request->session();
				$session->write([
  							'Members.id' => $res['id'] ,
  							'Members.email' => $res['email']
  						]);
				$messageUser ="Vous êtes bien connecté.";
				return $this->redirect([
					'controller' => 'accounts',
					'action' => 'index', 'all']);
			}else{
				$messageUser="Votre identifiant ou mot de passe est incorrect.";
			}
		}else {
			$messageUser = "Veuillez vous connecter.";
		}
		$this->set('messageUser',$messageUser);       
    }

    public function logout(){
            $messageUser ="";
            if($this->request->session() !== null){
                $this->request->session()->destroy();
                return $this->redirect([
                    'controller' => 'accounts',
                    'action' => 'connexion']);
            }else{
                $messageUser = 'Echec de la deconnexion.';
            }
            $this->set('messageUser', $messageUser);
    }
    
    public function addmember(){
        $this->set('title', 'inscription');
        
        if(!session_id()) {
            session_start();
        }
        
        $messageUser="";
        if($this->request->is('post')){
            $data = $this->request->data;
            $this->loadModel('Members');
            $res = $this->Members->find('all')->where(['Members.email' => $data['userName']]);
            $res = $res->first();
            if($res['email'] == $data['userName']){
                $messageUser = 'Le username ' . $data['userName'] . ' existe déjà.';
            } else if(!filter_var($data['userName'], FILTER_VALIDATE_EMAIL)){
                $messageUser = 'Votre email ' . $data['userName'] . ' n\'est pas valide.';
            }else if($data['password_1'] != $data['password_2']){
                $messageUser = 'Veuillez vérifier votre mot de passe.';
            }else if(empty($data['password_1'] OR $data['password_2'])){
                $messageUser = 'Votre mot de passe ne peut pas être vide.';
            }else{
                $members = $this->Members->newEntity();
                $data = array(
                        'email' => $data['userName'],
                        'password' =>$data['password_1']
                );
                $members = $this->Members->patchEntity($members, $data);

                if ($this->Members->save($members)) {
                    $messageUser = 'Merci pour votre inscription !';
                }else{
                    $messageUser = 'Echec de l\'inscription.';
                }
            }			
        }
        $this->set('messageUser',$messageUser);
    }

    public function myprofile() {
        
    }

    public function halloffame() {
        $this->loadModel('Logs');
        $sport_tab = $this->Logs->find('all')->where(['Logs.log_type']);
        $this->loadModel('Logs');
        $rank = $this->Logs->find('all')
            ->order(["log_value" => "DESC"])
            ->toArray();
        $this->set('sport', $sport_tab);
        $this->set('rank', $rank);       
    }
    
    public function detail($idwo){
        $this->loadModel('Workout');
        if($this->request->is('post')){
            $d = $this->request->data;
            $this->Workout->editWo($d['id'], $d['date'], $d('end-date'), $d['sport']);
        }
        $this->set("current", $this->Workout->set($idwo));
    }

    public function myresults() {
        $session = $this->request->session();
        $member_id = $session->read('Members.id');
        $this->loadModel('Logs');
        $results = $this->Logs->find('all')->where(['Logs.member_id' => $member_id]);
        foreach ($results as $key => $value) {
                    $res[] = $value; 
        }
        pr($res);
        $this->set('res', $res);
    }

    public function mydevices() {
        $session = $this->request->session();
        $member_id = $session->read('Members.id');
        $this->loadModel('Devices');
        $devices = $this->Devices->find('all')->where(['Devices.member_id' => $member_id]);
        foreach ($devices as $key => $value) {
                    $deviceDisplay[] = $value; 
        }
        pr($deviceDisplay);
        $this->set('work', $deviceDisplay);
    }
    
    public function myworkouts() {
        $session = $this->request->session();
        $member_id = $session->read('Members.id');
        $this->loadModel('Workouts');
        $workouts = $this->Workouts->find('all')->where(['Workouts.member_id' => $member_id]);
        foreach ($workouts as $key => $value) {
                    $workoutDisplay[] = $value; 
        }
        pr($workoutDisplay);
        $this->set('work', $workoutDisplay);
    }
    
    public function addworkout() {
        $session = $this->request->session();
        $member_id = $session->read('Members.id');
        $this-> loadModel("Workouts");
        if($this->request->is('post')){
            $d = $this->request->data;
            $workouts = $this->Workouts->newEntity();
            $d = array(
                    'member_id' => $member_id,
                    'date' => $d['date'],
                    'end_date' => $d['end_date'],
                    'location_name' => $d['location_name'],
                    'description' => $d['description'],
                    'sport' => $d['sport']
            );
            $workouts = $this->Workouts->patchEntity($workouts, $d);
            if ($this->Workouts->save($workouts)) {
                    return $this->redirect([
                    'controller' => 'accounts',
                    'action' => 'myworkouts']);
                }else{
                    $messageUser = 'Echec.';
                }
        }
    }

    public function adddevices() {
        $this-> loadModel("Devices");
        $session = $this->request->session();
        $member_id = $session->read('Members.id');
        if($this->request->is('post')){
            $d = $this->request->data;
            $devices = $this->Devices->newEntity();
            $d = array(
                    'member_id' => $member_id,
                    'serial' => $d['serial'],
                    'description' => $d['description'],
                    'trusted' => 0
            );
            $devices = $this->Devices->patchEntity($devices, $d);
            if ($this->Devices->save($devices)) {
                    return $this->redirect([
                    'controller' => 'accounts',
                    'action' => 'mydevices']);
                }else{
                    $messageUser = 'Echec.';
                }
        }
    }

    public function addresult() {
        $session = $this->request->session();
        $member_id = $session->read('members.id');
        $this->loadModel("Logs");
        $this->loadModel("Devices");
        $this->loadModel("Workouts");
        $wid=$workout_id;
        $this->set('work_id', $wid);
        $tra=$this->Devices->find()->where(['member_id' => $member_id, 'trusted' =>'0'])->toArray();
        $did=$tra[0]['id'];
        $this->set('device_id', $did);
        $this-> loadModel("Logs");
        if($this->request->is('post')){
            $d = $this->request->data;
            $results = $this->Logs->newEntity();
            $d = array(
                    'member_id' => $member_id,
                    'workout_id' => $d['workout_id'],
                    'device_id' => $d['device_id'],
                    'date' => $d['date'],
                    'location_latitude' => $d['location_latitude'],
                    'location_longitude' => $d['location_longitude'],
                    'log_type' => $d['log_type'],
                    'log_value' => $d['log_value']
            );
            $results = $this->Logs->patchEntity($results, $d);
            if ($this->Logs->save($results)) {
                    return $this->redirect([
                    'controller' => 'accounts',
                    'action' => 'myresults']);
                }else{
                    $messageUser = 'Echec.';
                }
        }
    }

    public function mybadges() {   
    }
    
    public function contact() {
    }
    
    public function faq(){
            
    }
        
    public function mentions(){
            
    }
}