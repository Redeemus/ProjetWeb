<?php
$this->layout = true;
$this->assign('title', 'Ajout de séance');
echo $this->Form->create('workoutadd');
?>

<h2 class="text-primary"><?php echo "AJOUTER UNE SÉANCE " ?></h2>

<div class="text-center">
	<h1>My Perfect Body</h1>
	<h2>Ajoutez une scéance</h2>
</div>
<br></br>
<?php echo $this->Form->create('workoutadd'); ?>
<div class="container-fluid text-center">
	<div class="col-md-12">
		<div class="form-group">
			<label class="col-md-12"> <?php echo $this->Form->input('date', array('label' => 'Date de début', 'type' => 'datetime')); ?></label>
		</div><br></br>
	    <div class="form-group">
			<label class="col-md-12"> <?php echo $this->Form->input('end_date', array('label' => 'Date de fin', 'type' => 'datetime')); ?></label>
		</div><br></br>
		<div class="form-group">
			<label class="col-md-12"> <?php echo $this->Form->input('location_name', array('label' => '', 'placeholder' =>'Localisation')); ?></label>
		</div>
                <div class="form-group">
			<label class="col-md-12"> <?php echo $this->Form->input('description', array('label' => '', 'placeholder' =>'Description')); ?></label>
		</div>
		<div class="form-group">
			<label class="col-md-12"> <?php echo $this->Form->input('sport', array('label' => '', 'placeholder' =>'Sport')); ?></label>
		</div>
		<div class="form-group">
			<label class="col-md-12"><?php echo $this->Form->submit('Ajouter'); ?></label>
			<label class="col-md-12"><?php echo $this->Form->end(); ?></label>
		</div>
	</div>
</div>