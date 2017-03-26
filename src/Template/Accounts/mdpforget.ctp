<?php $this->layout = true;
?>

<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('mdp'); ?>

<br></br>
<div class="text-center">
	<h1>My Perfect Body</h1>
	<h3>Renvoie d'un nouveau mot de passe !</h3>
</div>


<div class="container-fluid text-center">
	<form class="form-horizontal" role="form">
        <div class="form-group"><br></br>
            <label class="col-md-12">  <?php echo $this->Form->input('email',array('label'=>'','placeholder' =>'Email')); ?></label>
        </div>
        <div class="form-group">        
            <div class="col-md-12">
                <?php echo $this->Form->submit('Envoyer'); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
	</form>
	<div class="col-md-12">
        <h3>Si vous n'êtes toujours pas inscrit, veuillez cliquer ici</h3>
		<button><?php echo $this->Html->link('Inscription', array('controller' => 'Accounts', 'action' => 'addmember')); ?></button>
	</div>
</div><br></br>