<?php $this->layout = true;
?>

<br></br><br></br>

<div class="text-center">
	<h1>My Perfect Body</h1>
	<h3>Nous vous attendions !</h3>
</div>
<?php echo $this->Form->create(null); ?>
<div class="container-fluid text-center">
    <div class="col-md-12">
        <h2><?php echo $messageUser; ?></h2>
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-12">  <?php echo $this->Form->input('userName', array('label' => '','placeholder' =>'Email')); ?></label>
            </div>
            <div class="form-group">
                <label class="col-md-12"> <?php echo $this->Form->input('password',array('label' => '','placeholder' =>'Password')); ?></label>
            </div>
            <div class ="btn"> <?php echo $this->Html->link('Mot de passe oublié ?', array('controller' => 'Accounts', 'action' => 'mdpforget')); ?></div>
            <div class="form-group">        
                <div class="col-md-12">
                    <?php echo $this->Form->submit('Login'); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </form>
    </div>
	
	    <div class="col-md-12">
        <div class ="btn">
            <button><?php echo $this->Html->link('Inscription', array('controller' => 'Accounts', 'action' => 'addmember')); ?></div></button>
    </div>
</div>




