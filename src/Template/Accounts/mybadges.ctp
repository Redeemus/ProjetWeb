<?php $this->layout = true;
?>

<div class="text-center">
    <h2 class="text-primary">
        <?php
        echo ($this->Html->image('badge.png'));
        echo " MES BADGES ";
        echo ($this->Html->image('badge.png'));
        ?>
    </h2>
</div>

<div>
<h4 class="badgetitre2">
    <?php echo ("Badges séance : "); ?>
</h4>
</div>

<h4 class="badgetitre">Badge BRONZE </h4>
<p class ="subtitle" >Un type de Log</p>
<p class="text-center">
    <?php
    echo ($this->Html->image('device1.png'));

    echo '<table class= "table-center">';
    echo '<tr>';

    echo '<th> Membre </th>';
    echo '</tr>';

    for ($i = 0; $i < count($log[0]); $i++) {

        echo '<tr>';
        echo '<td>' . $log[0][$i]['Member']['email'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</p>
<h4 class="badgetitre">Badge ARGENT </h4>
<p class ="subtitle" >3 types de Log répétés</p>
<p class="text-center">
    <?php
    echo ($this->Html->image('device5.png'));
    echo '<table class= "table-center">';
    echo '<tr>';

    echo '<th> Membre </th>';
    echo '</tr>';

    for ($i = 0; $i < count($log[1]); $i++) {

        echo '<tr>';
        echo '<td>' . $log[1][$i]['Member']['email'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</p>
<h4 class="badgetitre">Badge OR </h4>
<p class ="subtitle" >5 types de Log répétés</p>
<p class="text-center">
    <?php
    echo ($this->Html->image('device10.png'));
    echo '<table class= "table-center">';
    echo '<tr>';

    echo '<th> Membre </th>';
    echo '</tr>';

    for ($i = 0; $i < count($log[2]); $i++) {

        echo '<tr>';
        echo '<td>' . $log[2][$i]['Member']['email'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>

</p>


<h4 class="badgetitre2">
    <?php echo ("Badges match : "); ?>
</h4>



<h4 class="badgetitre">Badge BRONZE </h4>
<p class ="subtitle" >1 séance effectuée</p>
<p class="text-center">
    <?php
    echo ($this->Html->image('device1.png'));
    echo '<table class= "table-center">';
    echo '<tr>';

    echo '<th> Membre </th>';
    echo '</tr>';

    for ($i = 0; $i < count($match[0]); $i++) {

        echo '<tr>';
        echo '<td>' . $match[0][$i]['Member']['email'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</p>
<h4 class="badgetitre">Badge ARGENT </h4>
<p class ="subtitle" >3 séances effectuées</p>
<p class="text-center">
    <?php
    echo ($this->Html->image('device5.png'));
    echo '<table class= "table-center">';
    echo '<tr>';

    echo '<th> Membre </th>';
    echo '</tr>';

    for ($i = 0; $i < count($match[1]); $i++) {

        echo '<tr>';
        echo '<td>' . $match[1][$i]['Member']['email'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</p>
<h4 class="badgetitre">Badge OR </h4>
<p class ="subtitle" >5 séances effectuées</p>
<p class="text-center">
    <?php
    echo ($this->Html->image('device10.png'));
    echo '<table class= "table-center">';
    echo '<tr>';

    echo '<th> Membre </th>';
    echo '</tr>';

    for ($i = 0; $i < count($match[2]); $i++) {

        echo '<tr>';
        echo '<td>' . $match[2][$i]['Member']['email'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</p>