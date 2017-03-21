<?php $this->layout = true;
?>

<div class="text-center"><h2 class="text-primary" ><?php echo "MES APPAREILS" ?></h2></div>
        <div class ="btn">
            <?php echo $this->Html->link('Ajouter un appareil', array('controller' => 'Accounts', 'action' => 'adddevices')); ?></div>

        <h2>
            Liste de mes objets connectés autorisés à faire des modifications :
        </h2>


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
                echo '<td><div class="text-center">' . $trusted[$cpt]['Device']['id'] . '</div></td>';
                echo '<td><div class="text-center">' . $trusted[$cpt]['Device']['serial'] . '</div></td>';
                echo '<td><div class="text-center">' . $trusted[$cpt]['Device']['description'] . '</div></td>';
                echo '<td><div class="text-center">' . $trusted[$cpt]['Device']['trusted'] . '</div></td>';
                echo '</tr>';
                $cpt++;
            }
            ?>
        </table>


        <h2>
            Liste de mes objets connectés en attente de validation :
        </h2>

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
                echo '<td><div class="text-center">' . $nottrusted[$cpt2]['Device']['id'] . '</div></td>';
                echo '<td><div class="text-center">' . $nottrusted[$cpt2]['Device']['serial'] . '</div></td>';
                echo '<td><div class="text-center">' . $nottrusted[$cpt2]['Device']['description'] . '</div></td>';
                echo '<td><div class="text-center">' . 0 . '</td>';
                echo '</tr>';
                $cpt2++;
            }
            ?>
        </table>

        <div class="alig">
            <div class="row">
                <?php echo $this->Form->create('devicedel'); ?>
                <div class="col-md-6">
                    <h2>Supprimer un appareil</h2>
                    <form>
                        <?php echo $this->Form->input('id', array('options' => $listeiddel)); ?>
                        <?php echo $this->Form->end('Supprimer'); ?>
                    </form>
                </div>

                <?php echo $this->Form->create('deviceval'); ?>
                <div class="col-md-6">
                    <h2>Valider un appareil</h2>
                    <form>
                        <?php echo $this->Form->input('id', array('options' => $listeidval)); ?>
                        <?php echo $this->Form->end('Valider'); ?>
                    </form>
                </div>
            </div>
        </div>
