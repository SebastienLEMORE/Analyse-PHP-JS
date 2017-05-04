<?php 
require('graphique.php');
require('fonction.php');
require('connexion.php'); //Permet la connexion à la base de données
?>

<html>
	<body>
	
	
			<?php
				if(isset($_POST['query']) && (trim($_POST['query'])!="") && preg_match("#^[0-9]+$#",$_POST['query']))
				{
	
					$n=$_POST['query'];
					//Recuperation des valeurs
					$req = $bd-> prepare('SELECT nombre,nbpremier FROM premiers WHERE nombre <='.$n.' order by nombre');
					$req->execute();
	
					while($rr = $req->fetch(PDO::FETCH_ASSOC)) {
						$donnees[]=array(intval($rr['nombre']),intval($rr['nbpremier']));
					}
					$derniercase=end($donnees);
					//Insertion de nouvelles valeurs
					if($derniercase['0']<$n){
						$nbpremier=$derniercase['1'];
						for($i=$derniercase['0']+1;$i<=$n;$i++){
							if(crible($i)){
								$nbpremier++;
								$donnees[]=array(intval($i),intval($nbpremier));
								$req = $bd-> prepare('insert into premiers(nombre,nbpremier) values('.$i.','.$nbpremier.')');
								$req->execute();
							}
							//Reduction Memoire
							if($i%1000){
								$req = $bd-> prepare('DELETE FROM premiers where 0!=nbpremier%1000 and nombre>=1000 ');
								$req->execute();
							}
						}	
					}
					$taille=count($donnees);
					for($i=1;$i<$taille;$i++){
							if($donnees[$i-1]['1']<$donnees[$i]['1'])
								$donnees[]=array($donnees[$i]['0'],$donnees[$i-1]['1']);
					}
					foreach($donnees as $key => $row){
						$nombre[$key]  = $row['0'];
						$nbnombre[$key] = $row['1'];
					}
					array_multisort($nombre, SORT_ASC, $nbnombre, SORT_ASC, $donnees);
					$max=intval(end($donnees)['1']);
			?>
			
			
		<div id="container" style="width: 90%; height: 400px;"> <div>

		<script>
			$(document).ready(function(){
				$(function () { 
					var myChart = Highcharts.chart('container', {
						chart: {
							type: 'spline'
						},
						title: {
							text: 'Nombre de nombre premier plus petit que n'
						},
						xAxis: {
							title: {
								text:'Nombre premier'
							}
						},
						yAxis: {
							max:<?php echo $max;?>,
							min:0,
							title: {
								text: 'Nombre de nbpremier'
							},
						},
						series: [{
							name: 'nbpremier',
							data: <?php echo json_encode($donnees);?>,
						}]
					});
				});
			});	
				</script>
				
				<?php }else
						echo '<div id="div">
									<div class="Entier"><fieldset>
										<p><span style="color:red;">Veuillez saisir un nombre entier</span><br/>
									</div>
								</div>';
						?>
	</body>
</html>
