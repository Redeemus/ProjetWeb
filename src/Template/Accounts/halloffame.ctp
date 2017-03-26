<?php $this->layout = true;
?>

<div class="text-center"><h2 class="text-primary"><?php echo "HALL OF FAME" ?></h2></div><html>
    <h2>
        <?php echo ("Classement par catégorie :"); ?>
    </h2>

    <table class="table table-striped">
        <?php
        $cpt = 0;
        foreach ($sport as $value) {
            echo '<tr> <th colspan = "3" > <h4 class="badgetitre">' . ($value['log_type']) . '</h4> </th> </tr>';
            echo '<tr class="success">';
            echo '<th class="col-md-3"><div class="text-center">  Place </div></th>';
            echo '<th class="col-md-3"><div class="text-center">  Membre </div></th>';
            echo '<th class="col-md-3"><div class="text-center">  Points </div></th>';
            echo '</tr>';

            foreach ($rank as $value2) {
                if ($value2['log_type'] == $value['log_type']) {

                    $cpt++;

                    echo '<tr>';
                    echo '<td><div class="text-center">' . $cpt . '</div></th>';
                    echo '<td><div class="text-center">' . $value2['member_id'] . '</div></td>';
                    echo '<td><div class="text-center">' . $value2['log_value'] . '</div></td>';
                    echo '</tr>';
                }
            }
            $cpt = 0;
        }
        ?>
    </table>
