<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = true;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

<div class="text-center">
    <div class="jumbotron">
        <h1>My Perfect Body</h1>
        <p>Futurs athlètes, soyez prêts à vous surpasser !</p>
    </div>
</div>

<div class="container-fluid text-center">
	<h2>La solution pour un Perfect Body</h2>
	<h4>La seule interface vous permettant un Perfect Body, simple, agréable et efficace</h4>
	<div class="row">
        <div class="col-sm-4 col-xs-push-1">
            <h3> Suivez vos performances </h3>
            <?php echo ($this->Html->image('Performance.png',array('height' => 200, 'width' => 200))); ?><br></br>
			<h4>Vous avez la possibilitée de consultez vos résultats</h4>
        </div>
        <div class=" col-sm-4 col-xs-push-3"> 
            <h3> Surclassez vos amis </h3>
            <?php echo ($this->Html->image('Classement.png', array('height' => 200, 'width' => 300))); ?><br></br>
			<h4>Pour plus de compétition, un classement avec vos amis est disponible</h4>
        </div>
    </div>
	<div class="row">
        <div class="col-xs-push-1 col-sm-4">
            <h3> Obtenez des badges </h3>
            <?php echo ($this->Html->image('badge.png', array('height' => 200, 'width' => 200))); ?>
			<h4>Battez des records et obtenez des badges</h4>
        </div>
        <div class="col-xs-push-3 col-sm-4"> 
            <h3> Organisez vos scéances </h3>
            <?php echo ($this->Html->image('calendrier.png', array('height' => 200, 'width' => 250))); ?>
			<h4>Prévoyez vos scéances pour une rigueur indispensable  </h4>
        </div>		
	</div>
</div>

<div class ="text-center">
	<button><?php echo $this->Html->link('Commencez dès maintenant', array('controller' => 'Accounts', 'action' => 'addmember')); ?></button>
	<br></br>
</div>