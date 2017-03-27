<?php $this->layout = true;
?>

<br></br><br></br>
<div class="text-center">
	<h1>My Perfect Body</h1>
	<h2>Mes Badges</h2>
</div>



<div class="container-fluid text-center">
	<h3>Bagde Logs</h3><br></br>
	<div class="row">
        <div class="col-sm-3 col-xs-push-0">
            <h3> OR </h3>
            <p class="text-center">
                <?php echo ($this->Html->image('or.png',array('height' => 100, 'width' => 100))); ?>
                <?php if (empty($stickers6)) {
                    ?>
                    <p>Aucun membre</p>
                    <?php
                } else {
                    

                    echo '<table class= "table-center">';
                    echo '<tr>';

                    echo '<th> Membre </th>';
                    echo '</tr>';

                    for ($i = 0; $i < count($stickers6); $i++) {

                            echo '<tr>';
                            echo '<td>' . $stickers6[$i] . '</td>';
                            echo '</tr>';
                    }
                    echo '</table>';

                } 
                ?>
            </p>
        </div>
		<div class=" col-sm-3 col-xs-push-1"> 
            <h3> Argent </h3>
			<p class="text-center">
                            <?php echo ($this->Html->image('argent.jpg',array('height' => 100, 'width' => 100))); ?>
                            <?php if (empty($stickers5)) {
                                ?>
                                <p>Aucun membre</p>
                                <?php
                            } else {
                                
				echo '<table class= "table-center">';
				echo '<tr>';

				echo '<th> Membre </th>';
				echo '</tr>';

				for ($i = 0; $i < count($stickers5); $i++) {

					echo '<tr>';
					echo '<td>' . $stickers5[$i] . '</td>';
					echo '</tr>';
				}
				echo '</table>';

                            } 
                            ?>
			</p>
        </div>
		<div class=" col-sm-3 col-xs-push-2"> 
            <h3> Bronze </h3>
			<p class="text-center">
                            <?php echo ($this->Html->image('bronze.png',array('height' => 100, 'width' => 100))); ?>
                            <?php if (empty($stickers4)) {
                                ?>
                                <p>Aucun membre</p>
                                <?php
                            } else {
                                
				echo '<table class= "table-center">';
				echo '<tr>';

				echo '<th> Membre </th>';
				echo '</tr>';

				for ($i = 0; $i < count($stickers4); $i++) {

					echo '<tr>';
					echo '<td>' . $stickers4[$i] . '</td>';
					echo '</tr>';
				}
				echo '</table>';

                            } 
                            ?>
			</p>
        </div>		
	</div>
	<br></br><br></br>
	<h3>Bagde Séances</h3><br></br>
	<div class="row">
        <div class="col-sm-3 col-xs-push-0">
            <h3> OR </h3>
            <p class="text-center">
                <?php echo ($this->Html->image('or.png',array('height' => 100, 'width' => 100))); ?>
                <?php if (empty($stickers3)) {
                                ?>
                                <p>Aucun membre</p>
                                <?php
                            } else {
                                

				echo '<table class= "table-center">';
				echo '<tr>';

				echo '<th> Membre </th>';
				echo '</tr>';

				for ($i = 0; $i < count($stickers3); $i++) {

					echo '<tr>';
					echo '<td>' . $stickers3[$i] . '</td>';
					echo '</tr>';
				}
				echo '</table>';

                            } 
                            ?>
			</p>
        </div>
		<div class=" col-sm-3 col-xs-push-1"> 
            <h3> Argent </h3>
			<p class="text-center">
                            <?php echo ($this->Html->image('argent.jpg',array('height' => 100, 'width' => 100))); ?>
                            <?php if (empty($stickers2)) {
                                ?>
                                <p>Aucun membre</p>
                                <?php
                            } else {
                                
				echo '<table class= "table-center">';
				echo '<tr>';

				echo '<th> Membre </th>';
				echo '</tr>';

				for ($i = 0; $i < count($stickers2); $i++) {

					echo '<tr>';
					echo '<td>' . $stickers2[$i] . '</td>';
					echo '</tr>';
				}
				echo '</table>';

                            } 
                            ?>
			</p>
        </div>
		<div class=" col-sm-3 col-xs-push-2"> 
            <h3> Bronze </h3>
			<p class="text-center">
                            <?php echo ($this->Html->image('bronze.png',array('height' => 100, 'width' => 100))); ?>
                            <?php if (empty($stickers1)) {
                                ?>
                                <p>Aucun membre</p>
                                <?php
                            } else {
                                
				echo '<table class= "table-center">';
				echo '<tr>';

				echo '<th> Membre </th>';
				echo '</tr>';

				for ($i = 0; $i < count($stickers1); $i++) {

					echo '<tr>';
					echo '<td>' . $stickers1[$i] . '</td>';
					echo '</tr>';
				}
				echo '</table>';

                            } 
                            ?>
			</p>
        </div>		
	</div>
</div>