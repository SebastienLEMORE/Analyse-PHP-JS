<?php 
define('TITRE', 'Nombre de nombre premier plus petit que n');
require('Onglet.php');
?>
<html>
	<head>
		<script src="jquerry.js"></script>
		<script src="highcharts.src.js"> </script>
	</head>
	<body>
		<div id="div">
				<div class="Entier"><fieldset>
					<form action="graphiques.php" method="post">
					<p>
						 <label for="recherche">Saisir un nombre :</label><br/> <input type="search" name="query" id="query" placeholder="Saisir un nombre"/><br></br>
						<input type="submit" name="envoi" value="Dessiner le graphe"/>
					</p>
					</form>
				</fieldset></div>
		</div>
	</body>
</html>