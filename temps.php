<?php 
define('TITRE', 'Temps d\'exécution');
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
					<form action="duree.php" method="post">
					<p>
						<span class="label"><label id="name">Nombre de Répétition :</label></span><br/>
						<span class="controle"><input type="text" class="text" id="entier1" name ="entier"/></span><br></br>
						<span class="label"><label id="name">Borne Inférieur :</label></span>
						<select name="BorneInf">
							<option value="1">1</option>
							<option value="100" >100</option>
							<option value="100000" selected>100000</option>
							<option value="100000000" >100000000</option>
							<option value="100000000000">100000000000</option>
						</select><br/><br/>
						<span class="label"><label id="name">Borne Supérieur :</label></span>
						<select name="BorneSup">
							<option value="999">999</option> 
							<option value="999999" >999999</option>
							<option value="999999999" selected>999999999</option>
							<option value="999999999999" >999999999999</option>
							<option value="999999999999999">999999999999999</option>
						</select><br></br>
						<span class="label">Choix des algorithmes :</span>
						<div class="formfield-checkbox">
							<input type="checkbox" id="checkbox1" name="choix[]" value="brute">
							<label for="checkbox1">Force Brute :</label>
						</div>

						<div class="formfield-checkbox">
							<input type="checkbox" id="checkbox2" name="choix[]" value="opti">
							<label for="checkbox2">Optimisation :</label>
						</div>
						<div class="formfield-checkbox">
							<input type="checkbox" id="checkbox3" name="choix[]" value="miller">
							<label for="checkbox3">Miller-Rabin :</label>
						</div><br>
						<span class="controle"><input type="submit" id="temps" value="Tester" /></span><br></br>
					</p>
					</form>
				</fieldset></div>
		</div>
	</body>
</html>