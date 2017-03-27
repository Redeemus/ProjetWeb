<?php $this->layout = true;
?>

<div class="text-center"><h3 class="text-primary"><?php echo "L'ÉQUIPE" ?></h3>

	<div class="text-center">
		<h1>My Perfect Body</h1>
		<h2>Contacts</h2>
	</div>
	<br></br>
    <div class="row">
        <div class="col-sm-3">
            <p><strong>Aurélien Barthe</strong></p><br>
			<?php echo ($this->Html->image('aurelien.jpg',array('height' => 200, 'width' => 200))); ?><br></br>
        </div>
        <div class="col-sm-3">
            <p><strong>Alexandre Mawas</strong></p><br>
			<?php echo ($this->Html->image('alexandre.jpg',array('height' => 200, 'width' => 200))); ?><br></br>
        </div>
        <div class="col-sm-3">
            <p><strong>Jerry Demesure</strong></p><br>
			<?php echo ($this->Html->image('jerry.jpeg',array('height' => 200, 'width' => 200))); ?><br></br>
        </div>
        <div class="col-sm-3">
            <p><strong>Charlelie Obadia</strong></p><br>
			<?php echo ($this->Html->image('charlelie.jpeg',array('height' => 200, 'width' => 200))); ?><br></br>
        </div>
    </div>
</div>

<div class="container">
    <h3>Nous contacter</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Nom" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
        <textarea class="form-control" id="comments" name="commentaire" placeholder="Commentaire" rows="5"></textarea>
            <br>
            <div class="row-fluid">
                <button><a class="btn" href="contact.ctp">Envoyer</a></button>
            </div>
			<br></br>
        </div>
		<div class="col-md-6 col-xs-push-3">
            <h4><span class="glyphicon glyphicon-map-marker"></span>ECE Paris</h4>
            <h4><span class="glyphicon glyphicon-phone"></span>Téléphone: 06 06 06 06 06</h4>
            <h4><span class="glyphicon glyphicon-envelope"></span>Email: ece@ece.fr</h4>
        </div>
    </div>
</div>