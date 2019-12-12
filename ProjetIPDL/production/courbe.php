    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
        

            <div class="clearfix"></div>

            <div class="row">
              
              

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tableau de la Statistique</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
		                <?php  require_once('menuHistogram.php') ?>
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

						// Titre du camembert
						$title = "Histogramme Circulaire 3D :";

						// Largeur du camembert
						$width = 750;

						// Hauteur du camembert
						$height = 400;

						// Tableau des légendes
						$legend = array();

						// Tabeau des valeurs
						$data = array();

						$query=$db->query("SELECT Formation, count(civilite) as effectif FROM a GROUP BY Formation ");
							$tab=array();
							while ($rsult=$query->fetch()) {
								$legend[]=$rsult['Formation'];
								$data[] = $rsult['effectif'];
							}

						foreach($legend as $key => $value){
							if(strlen($value)>30){
								$lbl = substr($value,0,27).'...';
							}
							else{
								$lbl = str_pad($value,30,'.');
							}
							$legends3[] = str_pad($lbl,35-strlen($data[$key]),'.').$data[$key];
							$datas3[] = $data[$key];
						}

						// Tabeau des couleurs (on passe la couleur de base, il va créer un dégradé)
						$color = array('#5C69AA');

						// Tri par ordre décroissant
						array_multisort($datas3, SORT_DESC, $legends3, SORT_ASC);

						// On crée l'image
						insertStatImage(1,$width,$height,$title,$legends3,$datas3,$color);

						echo'</br></br>';
					?>

				</tbody>
	            </table>
	            </div>						
	          </div>
	         </div>
	        </div>
	        </div>
	      </div>
	    </div>
	   <!-- /page content -->
	    </div>
	</div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
