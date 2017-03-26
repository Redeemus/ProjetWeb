<?php $this->layout = true;
?>

<div class="text-center"><h2 class="text-primary"><?php echo "MES SÉANCES" ?></h2></div>
<div class ="btn">
    <?php echo $this->Html->link('Ajouter une séance', array('controller' => 'Accounts', 'action' => 'addworkout')); ?></div>

<h2>
    Liste de toutes mes séances: 
</h2>


        <table class="table table-striped">
            <?php
            $cpt = 0;
            echo '<tr>';
            echo '<th class="col-md-2"><div class="text-center"> Date de début  </div></th>';
            echo '<th class="col-md-2"><div class="text-center"> Date de fin  </div></th>';
            echo '<th class="col-md-2"><div class="text-center"> Localisation  </div></th>';
            echo '<th class="col-md-2"><div class="text-center"> Sport  </div></th>';
            echo '<th class="col-md-2"><div class="text-center"> Description  </div></th>';
            echo '<th class="col-md-2"><div class="text-center"> Compétition  </div></th>';
            echo '</tr>';
            foreach ($work as $value) {
                echo '<tr>';
                echo '<td><div class="text-center">' . $work[$cpt]['date'] . ' </div></td>';
                echo '<td><div class="text-center">' . $work[$cpt]['end_date'] . ' </div></td>';
                echo '<td><div class="text-center">' . $work[$cpt]['location_name'] . ' </div></td>';
                echo '<td><div class="text-center">' . $work[$cpt]['sport'] . ' </div></td>';
                echo '<td><div class="text-center">' . $work[$cpt]['description'] . ' </div></td>';
                echo '<td><div class="text-center">' . $work[$cpt]['contest_id'] . ' </div></td>';
                echo '</tr>';
                $cpt++;
            }
            ?>
        </table>


<h2>
    Liste de mes séances prévues: 
</h2>

<table class="table table-striped">
    <?php
    $cpt = 0;
    echo '<tr class="warning">';
    echo '<th class="col-md-2"><div class="text-center"> Date de début  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Date de fin  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Localisation  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Sport  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Description  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Compétiton  </div></th>';
    echo '</tr>';
    

            foreach ($work as $value) {
                if ($work[$cpt]['date'] > date('Y-m-d H:i:s')) {
                    echo '<tr>';
                    echo '<td><div class="text-center">' . $work[$cpt]['date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['end_date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['location_name'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['sport'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['description'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['contest_id'] . ' </div></td>';
                    echo '</tr>';
                }
                $cpt++;
            }
            ?>
        </table>


<h2>
    Liste de mes séances matches: 
</h2>

<table class="table table-striped">
    <?php
    $cpt = 0;
    echo '<tr class="info">';
    echo '<th class="col-md-2"><div class="text-center"> Date de début  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Date de fin  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Localisation  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Sport  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Description  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Compétition  </div></th>';
    echo '</tr>';
    
            foreach ($work as $value) {
                if ($work[$cpt]['contest_id'] != NULL) {
                    echo '<tr>';
                    echo '<td><div class="text-center">' . $work[$cpt]['date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['end_date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['location_name'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['sport'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['description'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['contest_id'] . ' </div></td>';
                    echo '</tr>';
                }
                $cpt++;
            }
            ?>
        </table>


<h2>
    Liste de mes séances d'entrainements réalisées: 
</h2>

<table class="table table-striped">
    <?php
    $cpt = 0;
    echo '<tr class="success">';
    echo '<th class="col-md-2"><div class="text-center"> Date de début  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Date de fin  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Localisation  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Sport  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Description  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Compétition  </div></th>';
    echo '</tr>';
    
            foreach ($work as $value) {
                if ($work[$cpt]['date'] != $work[$cpt]['end_date'] && $work[$cpt]['end_date'] < date('Y-m-d H:i:s')) {
                    echo '<tr>';
                    echo '<td><div class="text-center">' . $work[$cpt]['date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['end_date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['location_name'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['sport'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['description'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['contest_id'] . ' </div></td>';
                    echo '</tr>';
                }
                $cpt++;
            }
            ?>
        </table>


<h2>
    Liste de mes séances d'entrainements en cours: 
</h2>

<table class="table table-striped">
    <?php
    $cpt = 0;
    echo '<tr class="warning">';
    echo '<th class="col-md-2"><div class="text-center"> Date de début  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Date de fin  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Localisation  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Sport  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Description  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Compétition  </div></th>';
    echo '</tr>';
    
            foreach ($work as $value) {
                if ($work[$cpt]['date'] < date('Y-m-d H:i:s') && $work[$cpt]['end_date'] > date('Y-m-d H:i:s')) {
                    echo '<tr>';
                    echo '<td><div class="text-center">' . $work[$cpt]['date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['end_date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['location_name'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['sport'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['description'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['contest_id'] . ' </div></td>';
                    echo '</tr>';
                }
                $cpt++;
            }
            ?>
        </table>


<h2>
    Liste de mes séances manquées: 
</h2>

<table class="table table-striped">
    <?php
    $cpt = 0;
    echo '<tr class="danger">';
    echo '<th class="col-md-2"><div class="text-center"> Date de début  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Date de fin  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Localisation  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Sport  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Description  </div></th>';
    echo '<th class="col-md-2"><div class="text-center"> Compétition  </div></th>';
    echo '</tr>';
    
            foreach ($work as $value) {
                if ($work[$cpt]['date'] == $work[$cpt]['end_date'] && $work[$cpt]['date'] < date('Y-m-d H:i:s') && $work[$cpt]['end_date'] < date('Y-m-d H:i:s') ) {
                    echo '<tr>';
                    echo '<td><div class="text-center">' . $work[$cpt]['date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['end_date'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['location_name'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['sport'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['description'] . ' </div></td>';
                    echo '<td><div class="text-center">' . $work[$cpt]['contest_id'] . ' </div></td>';
                    echo '</tr>';
                }
                $cpt++;
            }
            ?>
        </table>
    </body>
</html>

