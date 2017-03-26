<?php $this->layout = true;
?>

<br></br><br></br>
<div class="text-center">
	<h1>My Perfect Body</h1>
	<h2>Mes Badges</h2>
</div>



<div class="container-fluid text-center">
	<h3>Bagde Scéance</h3><br></br>
	<div class="row">
        <div class="col-sm-3 col-xs-push-0">
            <h3> OR </h3>
            <p class="text-center">
				<?php
				echo ($this->Html->image('or.png',array('height' => 100, 'width' => 100)));

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
        </div>
		<div class=" col-sm-3 col-xs-push-1"> 
            <h3> Argent </h3>
			<p class="text-center">
				<?php
				echo ($this->Html->image('argent.jpg',array('height' => 100, 'width' => 100)));;
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
        </div>
		<div class=" col-sm-3 col-xs-push-2"> 
            <h3> Bronze </h3>
			<p class="text-center">
				<?php
				echo ($this->Html->image('bronze.png',array('height' => 100, 'width' => 100)));;
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
        </div>		
	</div>
	<br></br><br></br>
	<h3>Bagde Matches</h3><br></br>
	<div class="row">
        <div class="col-sm-3 col-xs-push-0">
            <h3> OR </h3>
            <p class="text-center">
				<?php
				echo ($this->Html->image('or.png',array('height' => 100, 'width' => 100)));

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
        </div>
		<div class=" col-sm-3 col-xs-push-1"> 
            <h3> Argent </h3>
			<p class="text-center">
				<?php
				echo ($this->Html->image('argent.jpg',array('height' => 100, 'width' => 100)));;
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
        </div>
		<div class=" col-sm-3 col-xs-push-2"> 
            <h3> Bronze </h3>
			<p class="text-center">
				<?php
				echo ($this->Html->image('bronze.png',array('height' => 100, 'width' => 100)));;
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
        </div>		
	</div>
</div>