

                        <?php
                        
                            if(isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3'])){
                                                                          
                              echo '<table class="table table-striped jambo_table bulk_action">';
                                  echo '<thead>';
                                      echo '<tr class="headings">';
                                          
                                          echo '<th class="column-title">ID</th>';        
                                          echo '<th class="column-title">Prenom(s)</th>';
                                          echo '<th class="column-title">Nom </th>';
                                echo '</tr>';
                              echo '</thread>';
                              echo '<tbody>';
                                  $query = $db->query("SELECT ID,prenom,nom FROM a");
                                                                                                                          
                                while ($rsult = $query->fetch() ) {
                                  echo "<tr>";
                                  echo '<td>'.$rsult['ID'].'</td>';
                                  echo '<td>'.$rsult['prenom'].'</td>';
                                  echo '<td>'.$rsult['nom'].'</td>';
                                  echo'</tr>';
                                }
                                $compte=$db->query("SELECT count(ID) FROM a");
                                $total=$compte->fetch();
                                echo "Effectif total :".$total[0];
                              echo '<tbody>';
                              echo '</table>';
                             }elseif (isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3']) && isset($_POST['4'])) {

                               echo '<table class="table table-striped jambo_table bulk_action">';
                                  echo '<thead>';
                                      echo '<tr class="headings">';
                                          
                                          echo '<th class="column-title">ID</th>';        
                                          echo '<th class="column-title">Prenom(s)</th>';
                                          echo '<th class="column-title">Nom </th>';
                                          echo '<th class="column-title">Date de naissance</th>';
                                echo '</tr>';
                              echo '</thread>';
                              echo '<tbody>';
                                  $query = $db->query("SELECT ID,prenom,nom,naissance FROM a");
                                                                                                                          
                                while ($rsult = $query->fetch() ) {
                                  echo "<tr>";
                                  echo '<td>'.$rsult['ID'].'</td>';
                                  echo '<td>'.$rsult['prenom'].'</td>';
                                  echo '<td>'.$rsult['nom'].'</td>';
                                  echo '<td>'.$rsult['naissance'].'</td>';
                                  echo'</tr>';
                                }
                                $compte=$db->query("SELECT count(ID) FROM");
                                $total=$compte->fetch();
                                echo "Effectif total :".$total[0];
                              echo '<tbody>';
                              echo '</table>';
                               
                             }

                            
                        //}
                        ?>