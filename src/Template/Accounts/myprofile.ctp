<?php $this->layout = true;
?>

<div class="text-center"><h2 class="text-primary" class="container text-center">MON PROFIL</h2></div>

        <div class="row">
            <div class="col-sm-2"><?php echo ($this->Html->image($img_name, array('height' => 160, 'width' => 160, 'class' => "img-circle person"))); ?></div>
            <?= $this->Form->create('update_pp', array('type' => 'file')); ?>
            <div class="col-sm-2"><?php echo(' <h2>Pseudo :</h2> ' . $user['Member']['email']); ?></div>
            <br> <?php echo $this->Form->file('file_img'); ?>
            <br><?php echo $this->Form->end('Charger / Modifier ma photo de profil'); ?>


        </div>

        <?php
        if (empty($lastworkout)) {
            ?>
            <h4 class="badgetitre">
                Dernière séance :
            </h4>
            <h5>Vous n'avez pas encore effectué de séance</h5>
            <div class="row-fluid">
                <div class="span4">
                    <div class ="btn">>
                        <a href="addworkout">Programmer ma première séance !</a>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>

            <table class="table table-striped">
                <h4 class="badgetitre">
                    Dernière séance :
                </h4>
                <?php
                echo '<tr>';
                echo '<th class="col-md-2"><div class="text-center">  Date de début  </div></th>';
                echo '<th class="col-md-2"><div class="text-center"> Date de fin </div></th>';
                echo '<th class="col-md-2"><div class="text-center"> Localisation </div></th>';
                echo '<th class="col-md-2"><div class="text-center"> Sport </div></th>';
                echo '<th class="col-md-2"><div class="text-center"> Description </div></th>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><div class="text-center">' . $lastworkout['Workout']['date'] . '</div></td>';
                echo '<td><div class="text-center">' . $lastworkout['Workout']['end_date'] . '</div></td>';
                echo '<td><div class="text-center">' . $lastworkout['Workout']['location_name'] . '</div></td>';
                echo '<td><div class="text-center">' . $lastworkout['Workout']['sport'] . '</div></td>';
                echo '<td><div class="text-center">' . $lastworkout['Workout']['description'] . '</div></td>';
                echo '</tr>';
                ?>
            </table>

            <?php
        }

        if (empty($lastdevice)) {
            ?>
            <h4 class="badgetitre">
                Dernier device rentré :
            </h4>
            <p>Vous n'avez pas encore entré d'appareil</p>
            <div class="row-fluid">
                <div class="span4">
                    <div class ="btn"><a href="adddevices">Ajouter un appareil</a></div></div></div>
            <?php
        } else {
            ?>

            <h4 class="badgetitre">
                Dernier device rentré :
            </h4>
            <table class="table table-striped">
                <?php
                echo '<tr>';
                echo '<th class="col-md-2"><div class="text-center">  Serial </div></th>';
                echo '<th class="col-md-2"><div class="text-center"> Description </div></th>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><div class="text-center">' . $lastdevice['Device']['serial'] . '</div></td>';
                echo '<td><div class="text-center">' . $lastdevice['Device']['description'] . '</div></td>';
                echo '</tr>';
                ?>
            </p>
        </table>

        <?php
    }
    ?>

    <div class="col-md-8">
        <br><h2>Modifier vos identifiants...</h2>
        <div class="form-group">
            <label class="col-md-8"> <?php echo $this->Form->create('memberMaj'); ?></label></div>
        <div class="form-group">
            <label class="col-md-8"> <?php echo $this->Form->input('newmail', array('label' => '', 'placeholder' => 'Nouveau mail')); ?></label></div>
        <div class="form-group">
            <label class="col-md-8"> <?php echo $this->Form->input('newpassword', array('label' => '', 'placeholder' => 'Nouveau mot de passe')); ?></label>
        </div>
        <div class="form-group">        
            <div class="col-md-8">
                <?php echo $this->Form->end('Mettre à jour'); ?>
            </div>
        </div>
    </div>
