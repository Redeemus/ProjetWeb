<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class Sticker extends Table {

    function ifempty($tab){
        if (empty($tab)){
            $tab[] = 0;
        }
    }
}
