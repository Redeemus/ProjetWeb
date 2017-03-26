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
        if(null!==$this->request->session()->read('Members.email')){
            $session = $this->request->session();
            $member_mail = $session->read('Members.email');
            $this->set('user', $member_mail);
            
            
            
        $folder_url = WWW_ROOT.'img';
        $rel_url = 'img';

        $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
        $memberid = $session->read('Members.id');
         if($this->request->is('post')){
            $formdata = $this->request->data;
            foreach($formdata as $file) {
                // replace spaces with underscores
                $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $filename = strtolower($memberid).'.'.$extension;
                // assume filetype is false
                $typeOK = false;
                // check filetype is ok
                foreach($permitted as $type) {
                    if($type == $file['type']) {
                        $typeOK = true;
                        break;
                    }
                }

                if($typeOK) {
                    // switch based on error code
                    switch($file['error']) {
                        case 0:
                            // check filename already exists
                            if(!file_exists($folder_url.'/'.$filename)) {
                                // create full filename
                                $full_url = $folder_url.'/'.$filename;
                                $url = $rel_url.'/'.$filename;
                                // upload the file
                                $success = move_uploaded_file($file['tmp_name'], $url);
                            } else {
                                // create unique filename and upload file
                                ini_set('date.timezone', 'Europe/London');
                                $now = date('Y-m-d-His');
                                $full_url = $folder_url.'/'.$now.$filename;
                                $url = $rel_url.'/'.$now.$filename;
                                $success = move_uploaded_file($file['tmp_name'], $url);
                            }
                            // if upload was successful
                            if($success) {
                                // save the url of the file
                                $result['urls'][] = $url;
                            } else {
                                $result['errors'][] = "Error uploaded $filename. Please try again.";
                            }
                            break;
                        case 3:
                            // an error occured
                            $result['errors'][] = "Error uploading $filename. Please try again.";
                            break;
                        default:
                            // an error occured
                            $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                            break;
                    }
                } elseif($file['error'] == 4) {
                    // no file was selected for upload
                    $result['nofiles'][] = "No file Selected";
                } else {
                    // unacceptable file type
                    $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
                }
            }
         }

        
            

            if (file_exists('WWW_ROOT' . 'img' . DS . $this->request->session()->read('Members.id') . '.jpg')) {;
                $this->set('img_name', $this->request->session()->read('Members.id') . ".png");
            } else {
                $this->set('img_name', "default.png");
                
            
        }
            $this->loadModel('Workouts');
            $member_id = $session->read('Members.id');
            $workouts = $this->Workouts->find('all')->where(['Workouts.member_id' => $member_id]);
            foreach ($workouts as $key => $value) {
                        $workoutDisplay[] = $value; 
            }
            $this->set('lastworkout', $workoutDisplay[0]);
            
            $this->loadModel('Devices');
            $member_id = $session->read('Members.id');
            $devices = $this->Devices->find('all')->where(['Devices.member_id' => $member_id]);
            foreach ($devices as $key => $value) {
                        $deviceDisplay[] = $value; 
            }
            $this->set('lastdevice', $deviceDisplay[0]);
        
            }else{
                return $this->redirect([
                    'controller' => 'accounts',
                    'action' => 'connexion']);
        }
        
    }

    public function halloffame() {
        $this->loadModel('Logs');
        $sport_tab = $this->Logs->find('all', ['fields' => 'Logs.log_type'])
            ->toArray();
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
        if(null!==$this->request->session()->read('Members.email')){
            $session = $this->request->session();
            $member_id = $session->read('Members.id');
            $this->loadModel('Logs');
            $results = $this->Logs->find('all')->where(['Logs.member_id' => $member_id]);
            foreach ($results as $key => $value) {
                        $res[] = $value; 
            }
            $this->set('res', $res);
            }else{
                return $this->redirect([
                    'controller' => 'accounts',
                    'action' => 'connexion']);
        }  
    }

    public function mydevices() {
        if(null!==$this->request->session()->read('Members.email')){
            $session = $this->request->session();
            $member_id = $session->read('Members.id');
            $this->loadModel('Devices');
            $val = $this->Devices->find('all', ['fields' => 'Devices.id'])
                ->where(['Devices.member_id' => $member_id])
                ->where(['Devices.trusted' => 0])
                ->toArray();
            for($i = 0; $i<count($val); $i++){
                $listval[]=$val[$i]['id'];
            }
            $del = $this->Devices->find('all', ['fields' => 'Devices.id'])
                ->where(['Devices.member_id' => $member_id])
                ->where(['Devices.trusted' => 1])
                ->toArray();
            for($i = 0; $i<count($del); $i++){
                $listdel[]=$del[$i]['id'];
            }
            $deval = $this->Devices->find('all')->where(['Devices.member_id' => $member_id])->where(['trusted' => 1]);
            foreach ($deval as $key => $value) {
                        $devalDisplay[] = $value; 
            }
            $denval = $this->Devices->find('all')->where(['Devices.member_id' => $member_id])->where(['trusted' => 0]);
            foreach ($denval as $key => $value) {
                        $denvalDisplay[] = $value; 
            }
            if ($this->request->is('post')) {
                if (isset($this->request->data['devicedel'])) {
                    $d= $this->request->data['devicedel'];
                    $idevice = $this->Devices->find()->where(['Devices.id' => $d['id']]);
                    $this->Devices->delete($idevice);
                    $this->redirect(array('controller' => 'accounts', 'action' => 'mydevices'));
                }
                if (isset($this->request->data['deviceval'])) {
                    $DeviceTable = TableRegistry::get('Devices');
                    $idDevice = $DeviceTable->get($this->request->data['id']);
                    $idDevice-> trusted = 1;
                    pr($idDevice);
                    if ($DeviceTable->save($idDevice)){
                       $this->redirect(array('controller' => 'accounts', 'action' => 'mydevices')); 
                    }
                    
                }
            }

            $this->set('listeidval', $listval);
            $this->set('listeiddel', $listdel);
            $this->set('trusted', $devalDisplay);
            $this->set('nottrusted', $denvalDisplay);
            }else{
                return $this->redirect([
                    'controller' => 'accounts',
                    'action' => 'connexion']);
        }
        
    }
    
    public function myworkouts() {
        if(null!==$this->request->session()->read('Members.email')){
            $session = $this->request->session();
            $member_id = $session->read('Members.id');
            $this->loadModel('Workouts');
            $workouts = $this->Workouts->find('all')->where(['Workouts.member_id' => $member_id]);
            foreach ($workouts as $key => $value) {
                        $workoutDisplay[] = $value; 
        }
        $this->set('work', $workoutDisplay);
            }else{
            return $this->redirect([
                    'controller' => 'accounts',
                    'action' => 'connexion']);
        }
        
        
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
            $session = $this->request->session();
            $member_id = $session->read('Members.id');
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
        $member_id = $session->read('Members.id');
        $this->loadModel("Workouts");
        $wid = $this->Workouts->find('all', ['fields' => 'Workouts.id'])
                ->where(['Workouts.member_id' => $member_id])
                ->toArray();
        for($i = 0; $i<count($wid); $i++){
            $work_id[]=$wid[$i]['id'];
        }
        $this->set('work_id', $work_id);
        $this->loadModel("Devices");
        $did=$this->Devices->find('all', ['fields' => 'Devices.id'])
                ->where(['Devices.member_id' => $member_id])
                ->toArray();
        for($i = 0; $i<count($did); $i++){
            $device_id[]=$did[$i]['id'];
        }
        $this->set('device_id', $device_id);
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
                    'location_logitude' => $d['location_logitude'],
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
    
    public function mdpforget() {
        if ($this->request->is('post')) {
            if (isset($this->request->data['mdp'])) {
                $mdp_actual = $this->Member->find()->first(array('fields' => array('password'), 'conditions' => array('email' => $this->request->data['mdp.email'])));
                if ($mdp_actual) {
                    $mdp_actual['Member']['password'] = $this->generer_mot_de_passe();
                    $id_actual = $this->Member->find("first", array('fields' => array('id'), 'conditions' => array('email' => $this->request->data['mdp']['email'])));

                    $this->Member->updateUser($id_actual['Member']['id'], $this->request->data['mdp']['email'], $mdp_actual['Member']['password']);

                    $this->send_email_mdp(($this->request->data['mdp']['email']), $mdp_actual['Member']['password']);
                    $this->Flash->success("Un email de confirmation a été envoyé !");
                    $this->redirect(array('controller' => 'accounts', 'action' => 'connexion'));
                } else {
                    $this->send_email_mdp(($this->request->data['mdp']['email']), "Vous n'êtes pas inscrit au site avec cet email");
                    $this->Flash->Error("Email invalide !");
                }
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