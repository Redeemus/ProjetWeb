<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;

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

        
            

            if (file_exists('WWW_ROOT' . 'img' . DS . $this->request->session()->read('Members.id') . '.png')) {;
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
                    $this->loadModel('Devices');
                    $d= $this->request->data;
                    $i = $d['id'];
                    $id = $listdel[$i];
                    $this->loadModel('Devices');
                    $idevice = $this->Devices->find()->where(['Devices.id' => $id]);
                    $delete = $this->Devices->delete($idevice);
                    $this->Devices->save($delete);
                    $this->redirect(array('controller' => 'accounts', 'action' => 'mydevices'));
                }
                if (isset($this->request->data['deviceval'])) {
                    $d= $this->request->data;
                    $i = $d['id'];
                    $id = $listval[$i];
                    $this->loadModel('Devices');
                    $idDevice = $this->Devices->find('all')->where(['id' => $id])->first();
                    $idDevice-> trusted = 1;
                    $this->Devices->save($idDevice);
                    $this->redirect(array('controller' => 'accounts', 'action' => 'mydevices'));
                    
                    
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
        $this->loadModel('Workouts');
        $val = $this->Workouts->find('all')
            ->where(['Workouts.member_id' => $member_id])
            ->toArray();
        switch(count($val)) {
                
                case 1:
                    $this->loadModel('Earnings');
                    $results = $this->Earnings->newEntity();
                    $date= Time::now();
                    $d = array(
                    'member_id' => $member_id,
                    'sticker_id' => 1,
                    'date' => $date,
                    );
                    $results = $this->Earnings->patchEntity($results, $d);  
                    $this->Earnings->save($results);
                    break;
                
                case 3:
                     $this->loadModel('Earnings');
                    $results = $this->Earnings->newEntity();
                    $date= Time::now();
                    $d = array(
                    'member_id' => $member_id,
                    'sticker_id' => 5,
                    'date' => $date,
                    );
                    $results = $this->Earnings->patchEntity($results, $d); 
                    $this->Earnings->save($results);
                    break;
                
                case 5:
                     $this->loadModel('Earnings');
                    $results = $this->Earnings->newEntity();
                    $date= Time::now();
                    $d = array(
                    'member_id' => $member_id,
                    'sticker_id' => 6,
                    'date' => $date,
                    );
                    $results = $this->Earnings->patchEntity($results, $d);  
                    $this->Earnings->save($results);
                    break;
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
                ->where(['Devices.trusted' => 1])
                ->toArray();
        for($i = 0; $i<count($did); $i++){
            $device_id[]=$did[$i]['id'];
        }
        $this->set('device_id', $device_id);
        $this-> loadModel("Logs");
        if($this->request->is('post')){
            $d= $this->request->data;
            $result = $this->Logs->newEntity();
            $i1 = $d['workout_id'];
            $workout_id = $work_id[$i1];
            pr($work_id);
            pr($workout_id);
            $i2 = $d['device_id'];
            $deviceid = $device_id[$i2];
            pr($device_id);
            pr($deviceid);
            $d = array(
                    'member_id' => $member_id,
                    'workout_id' => $workout_id,
                    'device_id' => $deviceid,
                    'date' => $d['date'],
                    'location_latitude' => $d['location_latitude'],
                    'location_logitude' => $d['location_logitude'],
                    'log_type' => $d['log_type'],
                    'log_value' => $d['log_value']
            );
            $result = $this->Logs->patchEntity($result, $d);
            if($this->Logs->save($result)){ 
            $this->redirect([
                    'controller' => 'accounts',
                    'action' => 'myresults']); 
            }
           
        }
        
       
        $this->loadModel('Logs');
        $val = $this->Logs->find('all')
            ->where(['Logs.member_id' => $member_id])
            ->toArray();
        switch(count($val)) { 
                case 1:
                    $this->loadModel('Earnings');
                    $results = $this->Earnings->newEntity();
                    $date= Time::now();
                    $d = array(
                    'member_id' => $member_id,
                    'sticker_id' => 4,
                    'date' => $date,
                    );
                    $results = $this->Earnings->patchEntity($results, $d);  
                    $this->Earnings->save($results);
                    break;
                
                case 3:
                     $this->loadModel('Earnings');
                    $results = $this->Earnings->newEntity();
                    $date= Time::now();
                    $d = array(
                    'member_id' => $member_id,
                    'sticker_id' => 5,
                    'date' => $date,
                    );
                    $results = $this->Earnings->patchEntity($results, $d);   
                    $this->Earnings->save($results);
                    break;
                
                case 5:
                     $this->loadModel('Earnings');
                    $results = $this->Earnings->newEntity();
                    $date= Time::now();
                    $d = array(
                    'member_id' => $member_id,
                    'sticker_id' => 6,
                    'date' => $date,
                    );
                    $results = $this->Earnings->patchEntity($results, $d); 
                    $this->Earnings->save($results);
                    break;
            }
    }
    
    
    public function mdpforget() {
        
    }

    public function mybadges() { 
        $this->loadModel('Earnings');
        $sticker = $this->Earnings->find('all')
            ->order(["sticker_id" => "DESC"])
            ->toArray();
        for($i = 0; $i<count($sticker)+1; $i++){
            switch($sticker[$i]['sticker_id']) {
                case 1:
                    $liststicker1[]=$sticker[$i]['member_id'];
                    break;
                case 2:
                    $liststicker2[]=$sticker[$i]['member_id'];
                    break;
                case 3:
                    $liststicker3[]=$sticker[$i]['member_id'];
                    break;
                case 4:
                    $liststicker4[]=$sticker[$i]['member_id'];
                    break;
                case 5:
                    $liststicker5[]=$sticker[$i]['member_id'];
                    break;
                case 6:
                    $liststicker6[]=$sticker[$i]['member_id'];
                    break;
                
            }
        }
        
        $this->set('stickers1', $liststicker1);
        $this->set('stickers2', $liststicker2);
        $this->set('stickers3', $liststicker3);
        $this->set('stickers4', $liststicker4);
        $this->set('stickers5', $liststicker5);
        $this->set('stickers6', $liststicker6);
    }
    
    public function contact() {
    }
    
    public function faq(){
            
    }
        
    public function mentions(){
            
    }
    
    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/accounts');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
}