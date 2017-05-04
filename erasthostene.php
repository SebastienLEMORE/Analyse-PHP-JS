<?php 
define('TITRE', 'Méthode d\'Érasthostène');
require('Onglet.php');
?>

<html>
	<head>
		<script src="jquerry.js"></script>
		<script src="fonction.js"></script>
	</head>
	<body>
		<div id="div">
					<p>	
						<span class="label"><label id="name">Taille du tableau :</label></span><br/>
						<span class="controle"><input type="text" class="text" id="taille" name ="entier"/></span>
					</p>
					<p>
						<span class="eras"><input type="submit" id="eras" value="Lancer l'algorithme" /></span><br></br>
						<span class="resultat"><label id="interdit" class="res1">Saisir un nombre entier inférieur à 9999</label></span>
					</p>
		</div>
	</body>
</html>