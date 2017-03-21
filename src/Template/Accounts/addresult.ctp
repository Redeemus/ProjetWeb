<h2 class="text-primary"><?php echo "AJOUTER UN RÉSULTAT" ?></h2>

<?php
$this->layout = true;
$this->assign('title', 'Ajout de résultat');
echo $this->Form->create('resultadd');
?>

<div class="col-md-8">

    <div class="form-group">
        <label class="col-md-8"> <?php echo $this->Form->input('workout_id', array('label' => 'Numéro du Résultat ', 'options' => $work_id)); ?></label>
    </div>

    <div class="form-group">
        <label class="col-md-8"> <?php echo $this->Form->input('device_id', array('label' => "Numéro de l'appareil ", 'options' => $device_id)); ?></label>
    </div>
    <div class="form-group">
        <label class="col-md-8"> <?php echo $this->Form->input('date', array('type' => 'datetime')); ?></label>
    </div>
    <div class="form-group">
        <label class="col-md-8"> <?php echo $this->Form->input('location_latitude', array('label' => '', 'placeholder' =>'Latitude')); ?></label>
    </div>
    <div class="form-group">
        <label class="col-md-8"> <?php echo $this->Form->input('location_logitude', array('label' => '', 'placeholder' =>'Longitude')); ?></label>
    </div>
    <div class="form-group">
        <label class="col-md-8"> <?php echo $this->Form->input('log_type', array('label' => '', 'placeholder' =>'Log Type')); ?></label>
    </div>
    <div class="form-group">
        <label class="col-md-8"> <?php echo $this->Form->input('log_value' , array('label' => '', 'placeholder' =>'Log Value')); ?></label>

    </div>
    <div class="form-group">
        <label class="col-md-8"><?php echo $this->Form->submit('Ajouter'); ?></label>
        <label class="col-md-8"><?php echo $this->Form->end(); ?></label>
    </div> 
</div>
