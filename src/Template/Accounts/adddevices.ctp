<?php $this->layout = true;
echo $this->Form->create('deviceadd'); ?>

<div class="col-md-8">
    <br><h2 class="text-primary"><?php echo "AJOUTER UN APPAREIL" ?></h2>
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-md-8"> <?php echo $this->Form->input('serial', array('label' => '','placeholder' => 'Serial')) ?></label>
        </div>
        <div class="form-group">
            <label class="col-md-8"> <?php echo $this->Form->input('description', array('label' => '', 'placeholder' => 'Description')); ?></label>
        </div>
        <div class="form-group">        
            <div class="col-md-8">
                <?php echo $this->Form->submit('Ajouter'); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </form>
</div>
