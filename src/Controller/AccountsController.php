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
        $this->set('actual_id',$this->request->session()->read('Members.email'));
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
        $sport_tab = $this->find('all')->where(['Logs.log_type']);
        $this->set('sport', $sport_tab);
        $this->set('rank', $this->Member->findforHall($this->Log->classement($sport_tab)));       
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
        
    }

    public function mydevices() {
        
    }
    
    public function myworkouts() {
     
    }
    
    public function addworkout() {
        $this-> loadModel("Workout");
        if($this->request->is('post')){
            $d = $this->request->data;
            $this->Workout->addWorkout($d['date'], $d['end-date'], $d['sport']);
        }
    }

    public function adddevices() {
        $this-> loadModel("Device");
        if($this->request->is('post')){
            $d = $this->request->data;
            $this->Device->addDevice($d['serial'], $d['description']);
        }
    }

    public function addresult() {
        $this-> loadModel("Log");
        if($this->request->is('post')){
            $d = $this->request->data;
            $this->Device->addResult($d['member_id'], $d['workout_id'], $d['device_id'], $d['date'], $d['location_latitude'], $d['location_logitude'], $d['log_type'], $d['log_value'] );
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