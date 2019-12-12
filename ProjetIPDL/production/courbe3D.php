<div id="content">
	<div class="inner">		
		<div class="row">
		     <div class="col-lg-12">
		        <h2> Gestion de la Statistique</h2>
		     </div>
		   </div>
		<hr />
		                
		<div class="row">
		    <dir class="col-lg-12 col-lg-offset-2">
		        <a href="?tableau=table" class="btn btn-primary btn-sm">Tableau</a>
		        <a href="?histogramme=histo1" class="btn btn-danger btn-sm">Histogramme Simple</a>
		        <a href="?histogramme=histo2" class="btn btn-success btn-sm">Histogramme deux phase</a>
		        <a href="?histogramme=histo3" class="btn btn-warning btn-sm">Histogramme Circulaire Simple</a>
		        <a href="?histogramme=histo4" class="btn btn-info btn-sm">Histogramme Circulaire 3D</a>  
		</dir>

		 <div class="row">
		      <div class="col-lg-12">
		           <div class="panel-body">
					<?php
					
						// Permet de lancer un traitement lorsque toutes les images sont chargées...
						//$checkStatImagesOnAllComplete = 'alert();';

						// Include avec toutes mes fonctions qui vont bien...
						include('artichow-1.1.0/statistiques_include.php');


						/****************************************************** LES CAMEMBERTS *****************************************************/

						/*********   EXEMPLE 1 (simple)   **********/

						// Tableau des légendes
						$legend = array();

						// Tabeau des valeurs
						$data = array();


						$query=$db->query("SELECT Formation, count(civilite) as effectif FROM a GROUP BY Formation ");
							$tab=array();
							while ($rsult=$query->fetch()) {
								$legend[]=$rsult['Formation'];
								$data3[] = $rsult['effectif'];
							}

												// Tableau des légendes
						// Mise en forme des légendes
						foreach($legend as $key => $value){
							if(strlen($value)>15){
								$lbl = substr($value,0,14).'.';
							}
							else{
								$lbl = str_pad($value, 15 , ' ');
							}
							$legend[$key] = $lbl;
						}

						// Tabeau des couleurs
						$color3 = array('#92DDF3','#5C69AA','#A35E9E','#DF6C6C');

						// Tableau des libelles de l'axe des abcisses
						

						$title = " EXEMPLE 2 (Des belles courbes...)";
						$width = 750;
						$height = 500;

						insertStatImage(2,$width,$height,$title,$legend,$data3,$color3,$data3,FALSE);

						echo'</br></br>';
					?>
		       </div> 

		     </div>

		 </div>
	</div>
</div>
