<?php
require('temps.php');
require('fonction.php');
require('connexion.php');
?>
<html>
	<body>
<?php
if(isset($_POST['entier']) && preg_match("#^[0-9]+$#",$_POST['entier']) && $_POST['entier']>0 && $_POST['entier']<=200){
	if($_POST['BorneInf']>$_POST['BorneSup']){
		echo '<div id="div">
				<div class="Entier"><fieldset>
					<p><span style="color:red;">'.$_POST['BorneInf'].' > '.$_POST['BorneSup'].'</span><br/>
				</div>
			</div>';
		exit();
	}
		
	
	if(isset($_POST['choix'])){
		$nrep= $_POST['entier'];
	
		$req = $bd-> prepare('SELECT nombre FROM premiers WHERE nombre>='.$_POST['BorneInf'].' and nombre <='.$_POST['BorneSup'].' order by nombre');
		$req->execute();
	
		while($rr = $req->fetch(PDO::FETCH_ASSOC)) {
			$donnees[]=intval($rr['nombre']);
		}
		if(isset($donnees)){
			$taille=count($donnees);
			for($i=0;$i<$nrep;$i++){
				$tab[$i]=$donnees[rand(0,$taille)];
			}
		}else{
			for($i=0;$i<$nrep;$i++){
				$tab[$i]=abs(rand($_POST['BorneInf'],$_POST['BorneSup']));
			}	
		}
		sort($tab);
		
		
		echo '<div id="div">';
		
		
		if(in_array('brute',$_POST['choix'])){
			for($i=0;$i<$nrep;$i++){
				$debut=microtime(true);
				$n=$tab[$i];
				brute($n);
				$tempsbrute[]=array($n,microtime(true)-$debut);
			}
			$sum=0;
			for($i=0;$i<count($tempsbrute);$i++)
				$sum=$sum+$tempsbrute[$i]['1'];
			echo '<div class="Entier"><fieldset>
					<p><span>Force Brute :</span><br/>
						<span>Temps moyen: '.($sum/count($tempsbrute)).' secondes.</span></p>
					</fieldset></div>';
		}
		else{
				$tempsbrute[]=null;
		}
		if(in_array('opti',$_POST['choix'])){
			for($i=0;$i<$nrep;$i++){
				$debut=microtime(true);
				$n=$tab[$i];
				crible($n);
				$tempscrible[]=array($n,microtime(true)-$debut);
			}
			$sum=0;
			for($i=0;$i<count($tempscrible);$i++)
				$sum=$sum+$tempscrible[$i]['1'];
		
			echo '	<div class="Entier"><fieldset>
						<p><span>Crible d\'Érastosthène :</span><br/>
						<span>Temps moyen: '.($sum/count($tempscrible)).' secondes.</span></p>
					</div>';

		}
		else{
				$tempscrible[]=null;
		}
				#--------------------------------Test de Miller-Rabin----------------------------------------#
		if(in_array('miller',$_POST['choix'])){
			
			for($i=0;$i<$nrep;$i++){
				$debut=microtime(true);
				$n=$tab[$i];
				miller(1,$n);
				$tempsmiller[]=array($n,microtime(true)-$debut);
			}
			$sum=0;
			for($i=0;$i<count($tempsmiller);$i++)
				$sum=$sum+$tempsmiller[$i]['1'];
			echo '		<div class="Entier"><fieldset>
							<p><span>Test de Miller-Rabin :</span><br/>
							<span>Temps : '.($sum/count($tempsmiller)).' secondes.</span></p>
						</div>';


		}
		else{
				$tempsmiller[]=null;
		}
				#--------------------------------Test de Miller-Rabin----------------------------------------#
		echo'</div>';
			
	?>
	<div id="container" style="width: 90%; height: 400px;"> <div>

		<script>
			
			$(document).ready(function(){
				$(function () {
					var myChart = Highcharts.chart('container', {
						chart: {
							type: 'line'
						},
						title: {
							text: 'Temps d\'éxecution'
						},
						xAxis: {
							max:<?php echo end($tab);?>,
							min:<?php echo $tab['0'];?>,
							title: {
								text:'Nombre'
							}
						},
						yAxis: {
							title: {
								text: 'Temps'
							},
						},
						series: [{
							name: 'Brute',
							data: <?php echo json_encode($tempsbrute);?>
						},
						{
							name: 'Optimisation',
							data: <?php echo json_encode($tempscrible);?>
						},
						{
							name: 'Miller-Rabin',
							data: <?php echo json_encode($tempsmiller);?>
						}]
					});
				});
			});
		</script></div>
<?php
}}
else{
		echo '<div id="div">
				<div class="Entier"><fieldset>
					<p><span style="color:red;">Veuillez saisir un nombre entier entre 1 et 200</span><br/>
				</div>
			</div>';
}	

?>
	</body>
</html>
