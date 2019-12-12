    <div class="container body">
      <div class="main_container">
           
        <div class="right_col" role="main">
          <div class="">
        

            <div class="clearfix"></div>
             <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Liste des etudiants <br><small>Veuillez choisir la liste en fonction de vos besoins</small></h2>
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
                 

                    <div class="table-responsive">
                      <script type="text/javascript">
                         function getComboA(id){
                          formu.submit();
                      }
                    </script>
                    <form method="post" name="formu">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                          
                          <th class="column-title">Prenom(s)</th>
                          <th class="column-title">Nom(s)</th>
                          <th class="column-title">
                          <select name ="datenaissance" id='1' class="select2_group form-control" onchange="getComboA(this);"> 
                                <option>Date de naissance</option>
                                <?php 
                                    $query1 = $db->query("SELECT distinct naissance FROM a");
                                                                        
                                      while ($rsult1 = $query1->fetch() ) {                  
                                        echo '<option>'.$rsult1['naissance'].'</option>';
                                                          
                                      }                 
                                ?>
                              </select>
                          </th>
                          <th class="column-title">
                              <select name ="nationalite" id='2' class="select2_group form-control" onchange="getComboA(this);"> 
                                <option>Nationalite</option>
                                <?php 
                                    $query2 = $db->query("SELECT distinct nationalite FROM a");
                                                                        
                                      while ($rsult2 = $query2->fetch() ) {                  
                                        echo '<option>'.$rsult2['nationalite'].'</option>';
                                                          
                                      }                 
                                ?>
                              </select>
                          </th>
                          <th>
                              <select name ="formation" id='2' class="select2_group form-control" onchange="getComboA(this);"> 
                                  <option> formation </option>
                                    <?php 

                                        $query3 = $db->query("SELECT distinct formation FROM a");
                                                                                           
                                        while ($rsult3 = $query3->fetch() ) {
             
                                            echo '<option>'.$rsult3['formation'].'</option>';
                                                          
                                        }
                                                      
                                    ?>
                              </select>
                          </th>
                          <th>
                              <select name ="civilite" id='4' class="select2_group form-control" onchange="getComboA(this)"> 
                                   <option> civilite </option>
                                    <?php 

                                       $query4 = $db->query("SELECT distinct civilite FROM a");
                                                                                            
                                       while ($rsult4 = $query4->fetch() ) {

                                          echo '<option>'.$rsult4['civilite'].'</option>';
                                                          
                                        }
                                                      
                                    ?>
                                                    
                              </select>
                          </th>
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php

                        
                         
                          if(isset($_POST['nationalite']) && isset($_POST['formation']) && isset($_POST['datenaissance']) && isset($_POST['civilite'])){
                                                    
                              $nationalite=htmlspecialchars($_POST['nationalite']);

                              $formation=htmlspecialchars($_POST['formation']);

                              $datenaissance=htmlspecialchars($_POST['datenaissance']);
                                                   
                              $civilite=htmlspecialchars($_POST['civilite']);


                                             

                              $query = $db->query("SELECT prenom,nom,naissance,nationalite,formation,civilite FROM a where nationalite = '".$nationalite."' or formation = '".$formation."' or naissance ='". $datenaissance."' or civilite ='".$civilite."'");
                                                                                        
                              while ($rsult = $query->fetch() ) {
                                  echo "<tr>";
                                    echo '<td>'.$rsult['prenom'].'</td>';
                                    echo '<td>'.$rsult['nom'].'</td>';
                                    echo '<td>'.$rsult['naissance'].'</td>';
                                    echo '<td>'.$rsult['nationalite'].'</td>';
                                    echo '<td>'.$rsult['formation'].'</td>';
                                    echo '<td>'.$rsult['civilite'].'</td>';
                                  echo'</tr>';
                              }
                                $compte=$db->query("SELECT count(ID) FROM a where nationalite = '".$nationalite."' or formation = '".$formation."' or naissance ='". $datenaissance. "' or civilite ='".$civilite."'");
                                $total=$compte->fetch();
                                echo "Effectif total :".$total[0];
                            }
                          ?>
                        </tbody>
                      </table>
                      </form>
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
    <!-- Datatables -->
    <script src="\DataTables\media\js\jquery.dataTables.min.js"></script>
    <script src="\DataTables\media\js\dataTables.bootstrap.min.js"></script>
    <script src="\DataTables\media\js\dataTables.buttons.min.js"></script>
    <script src="\DataTables\media\js\buttons.bootstrap.min.js"></script>
    <script src="\DataTables\media\js\buttons.flash.min.js"></script>
    <script src="\DataTables\media\js\buttons.html5.min.js"></script>
    <script src="\DataTables\media\js\buttons.print.min.js"></script>
    <script src="\DataTables\media\js\dataTables.fixedHeader.min.js"></script>
    <script src="\DataTables\media\js\dataTables.keyTable.min.js"></script>
    <script src="\DataTables\media\js\dataTables.responsive.min.js"></script>
    <script src="\DataTables\media\js\responsive.bootstrap.js"></script>
    <script src="\DataTables\media\js\dataTables.scroller.min.js"></script>
    <script src="/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

   
