  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PRESENTATION DE LA STATISTIQUE PAR LES HISTOGTOGRAMME</h2>
          
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_conten">
                    <br />
                      
              </div>
            <?php
              require_once('menuHistogram.php');

               if (isset($_GET['histogram']) && $_GET['histogram']=='Simple'){
                echo "<br><br>";

                                    
                  // Permet de lancer un traitement lorsque toutes les images sont chargées...
                        //$checkStatImagesOnAllComplete = 'alert();';

                        // Include avec toutes mes fonctions qui vont bien...
                        include('artichow-1.1.0/statistiques_include.php');


                        /****************************************************** LES CAMEMBERTS *****************************************************/

                        /*********   EXEMPLE 1 (simple)   **********/

                        // Titre du camembert
                        $title = "Histogramme Circulaires simple : Effectif par formation";

                        // Largeur du camembert
                        $width = 750;

                        // Hauteur du camembert
                        $height = 400;

                        // Tableau des légendes
                        $legend = array();

                        // Tabeau des valeurs
                        $data = array();

                        $query=$connexion->query("SELECT Formation, count(civilite) as effectif FROM a GROUP BY Formation ");
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
          
            }else if(isset($_GET['histogram']) && $_GET['histogram']=='couleurs'){

              echo "<br><br>";
                        // Permet de lancer un traitement lorsque toutes les images sont chargées...
            //$checkStatImagesOnAllComplete = 'alert();';

            // Include avec toutes mes fonctions qui vont bien...
            include('artichow-1.1.0/statistiques_include.php');


            /****************************************************** LES CAMEMBERTS *****************************************************/

            /*********   EXEMPLE 1 (simple)   **********/

            // Titre du camembert
            $title = "Histogramme Circulaire (simple) :";

            // Largeur du camembert
            $width = 750;

            // Hauteur du camembert
            $height = 400;

            // Tableau des légendes
            $legend = array();

            // Tabeau des valeurs
            $data = array();

             try {
                  $db = new PDO ('mysql:host=localhost;dbname=statistiques','root','');
                } catch (Exception $e) {
                 die('Erreur :'.$e->getMessage());
                }

            $query=$connexion->query("SELECT Formation, count(civilite) as effectif FROM a GROUP BY Formation ");
              $tab=array();
              while ($rsult=$query->fetch()) {
                $legend[]=$rsult['Formation'];
                $data[] = $rsult['effectif'];
              }

            // On crée l'image
            insertStatImage(1,$width,$height,$title,$legend,$data,'');

            echo'</br></br>';
                  }else{

                    
                            
                          
                  
                                 include('connect_db.php');

                                  $requete1=$connexion->query("SELECT Formation, count(ID),civilite from a where civilite='Monsieur'");
                                  $requete2=$connexion->query("SELECT Formation, count(ID), civilite from a where civilite='Mademoiselle'");

                                  $requete3=$connexion->query("SELECT Formation, count(ID) from a where jour_soir='JOUR' ");

                                  $requete4=$connexion->query("SELECT Formation, count(ID) from a where Boursier=0");


                                  $don=$requete1->fetch();

                                  $don2=$requete2->fetch();

                                  $don3=$requete3->fetch();

                                  $don4=$requete4->fetch();
                                

                              ?>

                              <div class="col-xs-12 col-xs-offset-2">
                              <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts-all-3.js"></script>
                              <style type="text/css">


                              </style>
                                 

                                     <div id="container" style="width: 700px; height: 450px;">
                                     <script type="text/javascript">
                                    
                                        //premier histogramme
                                        var chart = document.getElementById("container");
                                        var myChart = echarts.init(chart);
                                        var option = {
                                            title: {
                                                text: "Histogramme"
                                            },
                                            legend: [
                                                {
                                                    data: ["Nombre d'etudiants"]
                                                }
                                            ],
                                            tooltip: {
                                                trigger: 'axis',
                                                axisPointer: {
                                                    type: 'shadow'
                                                }
                                            },
                                            xAxis: [
                                                {
                                                    type: 'category',
                                                    data: ['Homme', 'Femme', 'Cour_jour', 'Non Boursier'],
                                                    axisTick: {
                                                        alignWithLabel: true
                                                    }
                                                }
                                            ],
                                            yAxis: [
                                                {
                                                    type: 'value'
                                                }
                                            ],
                                            series: [
                                                {
                                                    name:"Nombre d'etudiants",
                                                    type:'bar',
                                                    barWidth: '60%',
                                                    data: [<?php echo $don[1]; ?>, <?php echo $don2[1]; ?>,<?php echo $don3[1]; ?>, <?php echo $don4[1]; ?>]
                                                }
                                            ]
                                        };
                                        myChart.setOption(option, true);
                                 </script>
                              <?php
                            }?>
                  </div>
                </div>
              </div>
              <!-- /form input mask -->

         </div>
       </div>
    </div>
</div>

 
  
  
             <!-- /form color picker -->
   
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


   

