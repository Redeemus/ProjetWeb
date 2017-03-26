<?php $this->layout = true;
?>

<div class="text-center"><h2 class="text-primary" ><?php echo "MES APPAREILS" ?></h2></div>

<div class="text-center">
	<h1>My Perfect Body</h1>
	<h2>Mes appareils</h2>
	<h4>Gérez vos objets connectés</h4>
</div>
<br></br>
<p class="col-sm-8">
	<strong>Allez directement : </strong><a href="#autorise"> Liste de mes objets connectés autorisés à faire des modifications</a>
	<a href="#validation">en attente de validation</a>
</p><br></br>

        <div class ="btn">
            <?php echo $this->Html->link('Ajouter un appareil', array('controller' => 'Accounts', 'action' => 'adddevices')); ?>
	</div>

		<a href="#supprimer">supprimer un appareil</a>
		<a href="#valider">valider un appareil</a>
                

        <h2 id="autorise">
            Liste de mes objets connectés autorisés à faire des modifications :
        </h2>

        <?php if (empty($trusted)) {
            ?>
            <p>Vous n'avez pas encore entré d'appareil</p>
            <?php
        } else {?>
            <table class="table table-striped">
            <?php
            $cpt = 0;
            echo '<tr class="success">';
            echo '<th class="col-md-3"><div class="text-center">  Id  </div></th>';
            echo '<th class="col-md-3"><div class="text-center"> Serial </div></th>';
            echo '<th class="col-md-3"><div class="text-center"> Description </div></th>';
            echo '<th class="col-md-3"><div class="text-center"> Trusted </div></th>';
            echo '</tr>';
            foreach ($trusted as $value) {
                echo '<tr>';
                echo '<td><div class="text-center">' . $trusted[$cpt]['id'] . '</div></td>';
                echo '<td><div class="text-center">' . $trusted[$cpt]['serial'] . '</div></td>';
                echo '<td><div class="text-center">' . $trusted[$cpt]['description'] . '</div></td>';
                echo '<td><div class="text-center">' . $trusted[$cpt]['trusted'] . '</div></td>';
                echo '</tr>';
                $cpt++;
            }
            ?>
        </table>
        <?php } ?>
        


        <h2 id="validation">
            Liste de mes objets connectés en attente de validation :
        </h2>
            
            <?php if (empty($nottrusted)) {
            ?>
            <p>Vous n'avez pas encore entré d'appareil</p>
            <?php
        } else {?>
            <table class="table table-striped">
            <?php
            echo '<tr class="warning">';
            echo '<th class="col-md-3"><div class="text-center">  Id  </div></th>';
            echo '<th class="col-md-3"><div class="text-center"> Serial </div></th>';
            echo '<th class="col-md-3"><div class="text-center"> Description </div></th>';
            echo '<th class="col-md-3"><div class="text-center"> Trusted </div></th>';
            echo '</tr>';
            $cpt2 = 0;
            foreach ($nottrusted as $value) {
                echo '<tr>';
                echo '<td><div class="text-center">' . $nottrusted[$cpt2]['id'] . '</div></td>';
                echo '<td><div class="text-center">' . $nottrusted[$cpt2]['serial'] . '</div></td>';
                echo '<td><div class="text-center">' . $nottrusted[$cpt2]['description'] . '</div></td>';
                echo '<td><div class="text-center">' . 0 . '</td>';
                echo '</tr>';
                $cpt2++;
            }
            ?>
        </table>
        <?php } ?>

        

        <div class="alig">
            <div class="row">
                <?php if (empty($listeiddel)) {
                    ?>
                    <p>Pas d'appareils supprimés</p>
                    <?php
                } else {?>
                    
                    <?php echo $this->Form->create('devicedel'); ?>
                <div class="col-md-6">
                    <h2 id="supprimer">Supprimer un appareil</h2>
                    <form>
                        <?php echo $this->Form->input('id', array('options' => $listeiddel)); ?>
                        <?php echo $this->Form->submit('Supprimer'); ?>
                        <?php echo $this->Form->end(); ?>
                    </form>
                </div>
            
        <?php } ?>
                
                <?php if (empty($listeidval)) {
                    ?>
                    <p>Pas d'appareil à valider</p>
                    <?php
                } else {?>
                    <?php echo $this->Form->create('deviceval'); ?>
                    <div class="col-md-6">
                    <h2 id="valider">Valider un appareil</h2>
                    <form>
                        <?php echo $this->Form->input('id', array('options' => $listeidval)); ?>
                        <?php echo $this->Form->submit('Valider'); ?>
                        <?php echo $this->Form->end(); ?>
                    </form>
                </div>
             <?php } ?>   
            </div>
        </div>
 }