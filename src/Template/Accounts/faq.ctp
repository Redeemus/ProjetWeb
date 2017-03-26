<?php $this->layout = true;
?>

<div class="text-center"><h2 class="text-primary"><?php echo "Foire aux Questions" ?></h2>
</div>       


<div class="text-center">
	<h1>My Perfect Body</h1>
	<h3>FAQ</h3>
</div><br></br>


<div class="Panel panel-success">
    <h3 class="panel-heading">Quel est le concept de My Perfect Body ?</h3>
    <p class="panel-body">Avec un suivi de vos entraînement, des challenges, une planification de vos scéances, My Perfect Body est une plateforme idéale pour vous améliorez et avoir une vision précise de votre progression.</p>
	
	<h3 class="panel-heading">Qui sommes nous ?</h3>
    <p class="panel-body">Nous sommes 4 élèves issus de l'école d'ingénieur <strong>ECE PARIS</strong> en master Objets Connectés, Réseaux et Services.</p>
	
	<h3 class="panel-heading">Comment s'inscrire ?</h3>
    <p class="panel-body">L'inscription est totalement gratuite et se fait en quelques secondes grâce à votre adresse mail, pour ceci <?php echo $this->Html->link("cliquer sur ce lien", array('controller' => 'Accounts', 'action' => 'addmember'));?>.</p>
	
	<h3 class="panel-heading">Je n'arrive plus à me connecter, comment récupérer mon compte ?</h3>
    <p class="panel-body">Il est possible que votre mot de passe soit éronné pour cela <?php echo $this->Html->link("cliquer sur ce lien", array('controller' => 'Accounts', 'action' => 'mdpforget'));?> entrez votre adresse mail et un nouveau mot de passe vous sera attribué.</p>
</div>
