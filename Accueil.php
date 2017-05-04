<?php 
define('TITRE', 'Test Primalité');
require('Onglet.php');
?>

<html>
	<head>
		<script src="jquerry.js"></script>
		<script src="fonction.js"></script>
	</head>
	<body>
		<div id="div">
			<div class="Algo3"><fieldset>
				<p>
					<span class="label"><label id="name">Test de Primalité :</label></span><br/>
					<span class="controle"><input type="text" class="text" id="entier2" name ="entier" /></span>
				</p>
				<p>	
					<span class="controle"><input type="submit" id="test" value="Tester" /></span><br></br>
					<span class="resultat"><label id="res" class="res2" style="display:none;">Nombre Premier</label></span>
				</p>
			</fieldset></div>
		</div>
	</body>
</html>