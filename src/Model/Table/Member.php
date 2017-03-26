<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;


class Member extends Table {
    
    public function findforHall($tab1){
        
      for($i = 0 ; $i < count($tab1) ; $i++){
          $var = $this->find('first', array('conditions' => array('Members.id' => $tab1[$i]['Log']['member_id']), 'fields' => 'email'));
          
          $tab1[$i]['Log']['member_id'] = $var['Members']['email'];//          $var = $this->find('first', array('conditions' => array('Member.id' => $tab1[$i]['Log']['member_id']), 'fields' => 'email'));
//                pr($var);
          
      }
      return $tab1;
    }
    
}
