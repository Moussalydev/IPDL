
                          <?php
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
                                  $db = new PDO ('mysql:host=localhost;dbname=projetIPDL','root','');
                                } catch (Exception $e) {
                                 die('Erreur :'.$e->getMessage());
                                }
                        if (isset($_POST['Formation'])) {
                    
                            $query=$db->query("SELECT Formation, count(civilite) as effectif FROM a GROUP BY Formation ");
                              $tab=array();
                              while ($rsult=$query->fetch()) {
                                $legend[]=$rsult['Formation'];
                                $data[] = $rsult['effectif'];
                              }
                             
                        }

                            // On crée l'image
                            insertStatImage(1,$width,$height,$title,$legend,$data,'');

                            echo'</br></br>';
                          ?>