<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title>MPB</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('bootstrap');
        echo $this->Html->script('bootstrap');
        /**echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');**/
        ?>

    </head>

    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#myPage">My Perfect Body</a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><?php echo $this->Html->link('Accueil', array('controller' => 'Accounts', 'action' => 'index')); ?></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mes services
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><?php echo $this->Html->link('Séances', array('controller' => 'Accounts', 'action' => 'myworkouts')); ?></li>
                              <li><?php echo $this->Html->link('Appareils', array('controller' => 'Accounts', 'action' => 'mydevices')); ?></li>
                              <li><?php echo $this->Html->link('Résultats', array('controller' => 'Accounts', 'action' => 'myresults')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link('Classement', array('controller' => 'Accounts', 'action' => 'halloffame')); ?></li>
                        <li><?php echo $this->Html->link('Informations', array('controller' => 'Accounts', 'action' => 'contact')); ?></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mon compte
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><?php echo $this->Html->link('Profil', array('controller' => 'Accounts', 'action' => 'myprofile')); ?></li>
                              <li><?php echo $this->Html->link('Badges', array('controller' => 'Accounts', 'action' => 'mybadges')); ?></li>
                              <li><?php echo $this->Html->link('Deconnexion', array('controller' => 'Accounts', 'action' => 'logout')); ?></li>
                            </ul>
                        </li>
                        <li><?php
                            if ($this->request->session() !== null) {
                                echo $this->Html->link('Deconnexion', array('controller' => 'Accounts', 'action' => 'logout'));
                            } else {
                                echo $this->Html->link('Connexion', array('controller' => 'Accounts', 'action' => 'connexion'));
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="corps">   
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>

        <footer id="footer">
            <div class="bg-success">
                <div class="row">
                    <div class=" col-xs-push-1 col-md-2">
                        <h4>Administrateur</h4>
						<ul class="nav">
                            <li><?php echo $this->Html->link("Alexandre Mawas", array('controller' => 'Accounts', 'action' => 'contact')); ?></li>
                            <li><?php echo $this->Html->link("Jerry Demesure", array('controller' => 'Accounts', 'action' => 'contact')); ?></li>
                            <li><?php echo $this->Html->link("Charléli Obadia", array('controller' => 'Accounts', 'action' => 'contact')); ?></li>
                            <li><?php echo $this->Html->link("Aurélien Barthe", array('controller' => 'Accounts', 'action' => 'contact')); ?></li>
                        </ul>
                    </div>
					<div class="col-xs-push-2 col-md-2 ">
                        <h4>Commencer</h4>
                        <ul class="nav">
                            <li><?php echo $this->Html->link("S'inscrire", array('controller' => 'Accounts', 'action' => 'addmember')); ?></li>
                            <li><?php echo $this->Html->link('Se connecter', array('controller' => 'Accounts', 'action' => 'connexion')); ?></li>
                            <li><?php echo $this->Html->link("FAQ", array('controller' => 'Accounts', 'action' => 'faq')); ?></li>
                        </ul>
                    </div>
                    <div class="col-xs-push-3 col-md-2 ">
                        <h4>Service Client</h4>
                        <ul class="nav">
                            <li><p><span class="glyphicon glyphicon-envelope"></span><a class="footer-contact" href="mailto:ece@ece.fr"> Contact : ece@ece.fr</a></p></li>  
                            <li><p><span class="glyphicon glyphicon-phone"></span><span class="footer-contact"> 06 06 06 06 06</span></p></li>
                        </ul>
                    </div>
				    <div class="col-xs-push-4 col-md-2 ">
                        <h4>Liens utiles</h4>
                        <ul class="nav">
                            <li><?php echo $this->Html->link("MPB SAS", array('controller' => 'Accounts', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link("Mentions légales", array('controller' => 'Accounts', 'action' => 'mentions')); ?></li>
                        </ul>
                    </div>
                    </div>
            </div>
        </footer>
    </body>
</html>