<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestion Réservation / suppression</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h2>Supprimer Réservation</h2>
        <div>
            <a href='.././index.php'>Accueil Administrateur</a><br/><br/><br/>
        </div>
        


	<?php
		require_once("../../conf/BDD_Connexion2.php");
		// Récupération des événements
		$req = "SELECT * FROM reservations";
		$evenements = mysql_query($req);
		
		if(mysql_num_rows($evenements)) $nbEvents = true;
		else $nbEvents = false;
			
		mysql_close();
	?>
   
    <?php
	if($nbEvents) {
		
		while($evenement = mysql_fetch_array($evenements)) {
                     $unEvenementId = $evenement['id_reservation'];
			echo '
			<table class="listeEvent" id="Evenement" >
				<tr><td>Titre : '.html_entity_decode($evenement['titre_reservation']).'</td></tr>
				<tr><td>Auteur : '.html_entity_decode($evenement['pseudoUtil']).'</td></tr>
				<tr><td>Contenu : '.html_entity_decode($evenement['contenu_reservation']).'</td></tr>
				<tr><td><a href="v_confirmationSuppression.php?confirmation=false&idE='.$unEvenementId.'">Supprimer</a></td></tr>
			</table>
			<br/><br/>
			';
		}
		
	}
        else {
                echo "<p>Aucune réservation à supprimer</p>";
              }
	?>


		
    </body>
</html>
