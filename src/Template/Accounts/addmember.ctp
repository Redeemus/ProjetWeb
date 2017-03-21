<?php $this->layout = true;
echo $this->Flash->render('auth'); ?>

<div class="container">
    <div class="col-md-8">
        <br><h2>Inscrivez-vous!</h2>
        <?php echo $messageUser; ?>
        <?= $this->Form->create(null); ?>
        <div class="form-group">
            <label class="col-md-8"> <?php
                echo $this->Form->input('userName',array('label' => '','placeholder' =>'Email'));
                ?></label>
        </div>
        <div class="form-group">
            <label class="col-md-8"> <?php echo $this->Form->input('password_1',array('label' => '','placeholder' =>'Mot de passe')); ?></label>
            <label class="col-md-8"> <?php echo $this->Form->input('password_2',array('label' => '','placeholder' =>'Confirmer votre mot de passe')); ?></label>
        </div>
        <div class="form-group">
            <label class="col-md-8"> <?php echo $this->Form->submit('Inscription'); ?></label>
            <label class="col-md-8"> <?php echo $this->Form->end(); ?></label>
        </div>
    </div>
</div>




