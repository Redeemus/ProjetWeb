<?php $this->layout = true;
?>

<div class="text-center"><h3 class="text-primary"><?php echo "L'ÉQUIPE" ?></h3>
    <div class="row">
        <div class="col-sm-3">
            <p><strong>Aurélien</strong></p><br>
        </div>
        <div class="col-sm-3">
            <p><strong>Alexandre</strong></p><br>
        </div>
        <div class="col-sm-3">
            <p><strong>Jerry</strong></p><br>
        </div>
        <div class="col-sm-3">
            <p><strong>Charles</strong></p><br>
        </div>
    </div>
</div>

<div class="container">
    <h3 class="text-center">Nous contacter</h3>
    <div class="row test">
        <div class="col-md-4">
            <p><span class="glyphicon glyphicon-map-marker"></span>ECE Paris</p>
            <p><span class="glyphicon glyphicon-phone"></span>Téléphone: 06 06 06 06 06</p>
            <p><span class="glyphicon glyphicon-envelope"></span>Email: grp2ocres@ece.fr</p>
        </div>
        <div class="col-md-8">
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
                <div class="span4">
                    <div class ="btn">
                        <a class="btn-primary" href="adddevices">Envoyer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>