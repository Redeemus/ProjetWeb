<h2 class="text-primary"><?php echo "AJOUTER UNE SÉANCE " ?></h2>
<?php
$this->layout = true;
$this->assign('title', 'Ajout de séance');
echo $this->Form->create('workoutadd');
echo $this->Form->input('date', array('label' => 'Date de début', 'type' => 'datetime'));
echo $this->Form->input('end_date', array('label' => 'Date de fin', 'type' => 'datetime'));
echo $this->Form->input('location_name', array('label' => '', 'placeholder' =>'Localisation'));
echo $this->Form->input('description', array('label' => '', 'placeholder' =>'Description'));
echo $this->Form->input('sport', array('label' => '', 'placeholder' =>'Sport'));
echo $this->Form->submit('Ajouter');
echo $this->Form->end();
?>

