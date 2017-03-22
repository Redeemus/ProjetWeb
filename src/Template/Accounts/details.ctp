<h2 class="text-primary"><?php echo "EDITER UNE SÉANCE " ?></h2>
<?php
$this->layout = true;
$this->assign('title', 'Editer une séance');
echo $this->Form->create('details');
echo $this->input->hidden('id', ('value' => $current-> id));
echo $this->Form->input('date', array('label' => 'Date de début', 'type' => 'datetime'));
echo $this->Form->input('end_date', array('label' => 'Date de fin', 'type' => 'datetime'));
echo $this->Form->input('location_name', array('label' => '', 'placeholder' =>'Localisation'));
echo $this->Form->input('description', array('label' => '', 'placeholder' =>'Description'));
echo $this->Form->input('sport', array('label' => '', 'placeholder' =>'Sport'));
echo $this->Form->submit('Editer');
echo $this->Form->end();
?>
