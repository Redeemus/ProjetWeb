<?php $this->layout = true;
?>

<div class="col-md-8"><br>
    <div class ="btn">
        <?php echo $this->Html->link('Inscription', array('controller' => 'Accounts', 'action' => 'addmember')); ?>
    </div>
</div>

<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('mdp'); ?>

<div class="col-md-8">
    <br><h2>Vous êtes déja inscrit, retrouvez votre mot de passe...</h2>
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-md-8">  <?php echo $this->Form->input('email',array('label'=>'','placeholder' =>'Email')); ?></label>
        </div>
        <div class="form-group">        
            <div class="col-md-8">
                <?php echo $this->Form->submit('Envoyer'); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </form>
</div>

