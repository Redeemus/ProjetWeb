<?php $this->layout = true;
echo $this->Flash->render('auth'); ?>

<br></br><br></br>

<div class="text-center">
	<h1>My Perfect Body</h1>
	<h3>Aucune raison de ne pas s'inscrire</h3>
</div>
<div class="container-fluid text-center">
    <div class="col-md-12">
        <h2>Inscrivez-vous !</h2>
        <?php echo $messageUser; ?>
        <?= $this->Form->create(null); ?>
        <div class="form-group">
            <label class="col-md-12"> <?php
                echo $this->Form->input('userName',array('label' => '','placeholder' =>'Email'));
                ?></label>
        </div>
        <div class="form-group">
            <label class="col-md-12"> <?php echo $this->Form->input('password_1',array('label' => '','placeholder' =>'Mot de passe')); ?></label>
            <label class="col-md-12"> <?php echo $this->Form->input('password_2',array('label' => '','placeholder' =>'Confirmez le mot de passe')); ?></label>
        </div>
        <div class="form-group">
            <label class="col-md-12"> <?php echo $this->Form->submit('Inscription'); ?></label>
            <label class="col-md-12"> <?php echo $this->Form->end(); ?></label>
        </div>
    </div>
</div>




