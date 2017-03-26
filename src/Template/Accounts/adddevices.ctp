<?php $this->layout = true;
echo $this->Form->create('deviceadd'); ?>
<br></br><br></br>
<div class="text-center">
	<h1>My Perfect Body</h1>
	<h2>Ajoutez un appareil</h2>
</div>
<br></br>

<div class="container-fluid text-center">
	<div class="col-md-12">
		<div class="form-group">
			<label class="col-md-12"> <?php  echo $this->Form->input('serial', array('label' => '','placeholder' => 'Serial')); ?></label>
		</div>
	    <div class="form-group">
			<label class="col-md-12"> <?php echo $this->Form->input('description', array('label' => '', 'placeholder' => 'Description')); ?></label>
		</div>
		<div class="form-group">
			<label class="col-md-12"><?php echo $this->Form->submit('Ajouter'); ?></label>
			<label class="col-md-12"><?php echo $this->Form->end(); ?></label>
		</div>
	</div>
</div>

