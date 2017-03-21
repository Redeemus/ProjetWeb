<?php $this->layout = true;
?>

<div class="container">   
    <div class="col-md-8">
        <div class ="btn">
            <?php echo $this->Html->link('Inscription', array('controller' => 'Accounts', 'action' => 'addmember')); ?></div>
    </div>

    <?php echo $this->Form->create(null); ?>

    <div class="col-md-8">
        <br><h2><?php echo $messageUser; ?></h2>
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-8">  <?php echo $this->Form->input('userName', array('label' => '','placeholder' =>'Email')); ?></label>
            </div>
            <div class="form-group">
                <label class="col-md-8"> <?php echo $this->Form->input('password',array('label' => '','placeholder' =>'Password')); ?></label>
            </div>
            <div class ="btn"> <?php echo $this->Html->link('Mot de passe oublié ?', array('controller' => 'Accounts', 'action' => 'mdpforget')); ?></div>
            <div class="form-group">        
                <div class="col-md-8">
                    <?php echo $this->Form->submit('Login'); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </form>
    </div>
</div>




