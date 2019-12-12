<div class="container body">
  <div class="main_container">
    <div class="right_col" role="main">
      
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
              <div class="x_title">
               <h2>APPLICATION DE GESTION DE LA STATISTIQUE</h2>
              
              <div class="clearfix"></div>
              </div>
          
              <div class="x_content">
              
                <form method="post" name="formu" action="#">
                     <div class="col-xs-offset-2">
                        <div class="col-xs-4">Formation
                          <select name ="formation" id="formation" class="select2_group form-control"> 
                          <option value="aucun">...Veuillez faire votre choix...</option>    
                            <?php 
                              $query = $connexion->query("SELECT distinct formation FROM a");       
                                while ($rsult = $query->fetch() ) {                  
                                  echo '<option value ='.$rsult['formation'].'>'.$rsult['formation'].'</option>'; 
                                }                 
                            ?>
                          </select>
                          
                        </div>
                         
                         <div class="col-xs-4">Option
                          <select name ="opt" id='opt' class="select2_group form-control">
                          
                          <option value="aucun">...Veuillez faire votre choix...</option>      
                          <?php 
                            $query = $connexion->query("SELECT distinct opt FROM a");         
                              while ($rsult = $query->fetch()) {
                                  echo '<option value ='.$rsult['opt'].'>'.$rsult['opt'].'</option>';            
                              }
                                                      
                          ?>
                              </select>
                              
                          </div>
                      </div>
                          <br><br><br>
                        <div class="col-xs-offset-2">
                          <div class="col-xs-4">Civilite
                              <select name ="civilite" id='civilite' class="select2_group form-control" >

                              <option value="aucun">...Veuillez faire votre choix...</option> 
                                <?php 
                                  $query = $connexion->query("SELECT distinct civilite FROM a");      
                                    while ($rsult = $query->fetch() ) {
                                          echo '<option '.$rsult['civilite'].'>'.$rsult['civilite'].'</option>';                      
                                    }
                                                      
                                ?>
                                           
                              </select>
                          </div>

                           <div class="col-xs-4">Nationalite
                              <select name ="Nationalite" id='Nationalite' class="select2_group form-control"> 
                              <option value="aucun">...Veuillez faire votre choix...</option> 
                                <?php 
                                  $query = $connexion->query("SELECT distinct Nationalite FROM a");   while ($rsult = $query->fetch() ) {
                                        echo '<option value ='.$rsult['Nationalite'].'>'.$rsult['Nationalite'].'</option>';
                                                          
                                    }
                                                      
                                ?> 
                                                  
                              </select>

                          </div>

                      </div>
                          
                  <br><br><br><br>
                  <div class="col-xs-offset-5">
                      <input type="button" class="btn btn-primary " name="terminer" id="terminer" value="terminer">
                  </div>
                </form>

                    <div class="col-xs-10 col-xs-offset-1">
                        <table id="tableau" class="table table-striped jambo_table bulk_action table-bordered"></table>
                    </div> 
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


     <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <script type="text/javascript">

      $(document).ready( function(){
        $("#terminer").click(function(){
          
          var formation = $("#formation").val()
          var opt = $("#opt").val()
          var civilite = $("#civilite").val()
          var Nationalite = $("#Nationalite").val()


         

       
      if ($("#formation").val()=="aucun" && $("#opt").val()=="aucun" && $("#civilite").val()=="aucun" && $("#Nationalite").val()=="aucun") {
     
        $.ajax({
            url: 'test.php',
            type: 'POST',
            data: 'formation=' + formation + 'opt =' + opt + 'civilite =' + civilite + 'Nationalite =' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Option</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
            
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.opt+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")            
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })

         }
          else if ($("#formation").val()!="aucun") {
            if ($("#formation").val()=="Master") {
          $.ajax({
            url: 'test1.php',
            type: 'POST',
            data: 'formation=' + formation,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#formation").val()=="DST_Informatique") {
          $.ajax({
            url: 'test2.php',
            type: 'POST',
            data: 'formation=' + formation,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#formation").val()=="DST") {
          $.ajax({
            url: 'test3.php',
            type: 'POST',
            data: 'formation=' + formation,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#formation").val()=="L.I.R.T") {
          $.ajax({
            url: 'test4.php',
            type: 'POST',
            data: 'formation=' + formation,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#formation").val()=="LICENCE") {
          $.ajax({
            url: 'test5.php',
            type: 'POST',
            data: 'formation=' + formation,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }
  }
      
        if ($("#opt").val()!="aucun") {
            if ($("#opt").val()=="GENIE") {
          $.ajax({
            url: 'optiontest1.php',
            type: 'POST',
            data: 'opt =' + opt,
            success: function(data){

              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Option</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.opt+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#opt").val()=="informatique") {
          $.ajax({
            url: 'optiontest2.php',
            type: 'POST',
            data: 'opt=' + opt,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Option</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.opt+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#opt").val()=="telecom_reseaux") {
          $.ajax({
            url: 'optiontest3.php',
            type: 'POST',
            data: 'opt =' + opt,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Option</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.opt+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#opt").val()=="TELECOMMINUCATIONS") {
          $.ajax({
            url: 'optiontest4.php',
            type: 'POST',
            data: 'opt=' + opt,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Option</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.opt+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }
  } 

 if ($("#civilite").val()!="aucun") {

        if($("#civilite").val()=="Monsieur"){
          
           $.ajax({
            url: 'effectifHomme.php',
            type: 'POST',
            data: 'civilite=' + civilite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")

                $("#tableau").append("<tbody></tbody>")  
               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })

        }

         else if($("#civilite").val()=="Mademoiselle" || $("#civilite").val()=="Madame"){
          
           $.ajax({
            url: 'effectifFemme.php',
            type: 'POST',
            data: 'civilite=' + civilite,

            success: function(data){
              
               json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")

                $("#tableau").append("<tbody></tbody>")  
               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })

        } 
    }




       if ($("#Nationalite").val()!="aucun") {
            if ($("#Nationalite").val()=="Malienne") {
          $.ajax({
            url: 'nationalite1.php',
            type: 'POST',
            data: 'Nationalite =' + Nationalite,
            success: function(data){
              alert(data)
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="senegalaise") {
          $.ajax({
            url: 'nationalite2.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="mauritanienne") {
          $.ajax({
            url: 'nationalite3.php',
            type: 'POST',
            data: 'Nationalite =' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="Congolaise") {
          $.ajax({
            url: 'nationalite4.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="burkinabe") {
          $.ajax({
            url: 'nationalite5.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="Nigerienne") {
          $.ajax({
            url: 'nationalite6.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }
      else  if ($("#Nationalite").val()=="Tchadienne") {
          $.ajax({
            url: 'nationalite7.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="Gabonaise") {
          $.ajax({
            url: 'nationalite8.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="Ivoirienne") {
          $.ajax({
            url: 'nationalite9.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="Centreafricaine") {
          $.ajax({
            url: 'nationalite10.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="Camerounaise") {
          $.ajax({
            url: 'nationalite11.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else  if ($("#Nationalite").val()=="Togolaise") {
          $.ajax({
            url: 'nationalite12.php',
            type: 'POST',
            data: 'Nationalite=' + Nationalite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Nationalite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }
  }
//effectif des Hommes par formation 

    if ($("#formation").val()!="aucun" && $("#civilite").val()!="aucun") {
      if ($("#formation").val()=="Master" && $("#civilite").val()=="Monsieur") {
          $.ajax({
            url: 'formation_civilite_Master.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
            //  alert(data)              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }if ($("#formation").val()=="DST" && $("#civilite").val()=="Monsieur") {
          $.ajax({
            url: 'formation_civilite_DST.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }if ($("#formation").val()=="LICENCE" && $("#civilite").val()=="Monsieur") {
          $.ajax({
            url: 'formation_civilite_LICENCE.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else if ($("#formation").val()=="DST_Informatique" && $("#civilite").val()=="Monsieur") {
          $.ajax({
            url: 'formation_civilite_DST.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else if ($("#formation").val()=="L.I.R.T" && $("#civilite").val()=="Monsieur") {
          $.ajax({
            url: 'formation_civilite_LIRT.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }
    }

    //effectif des Femme par formation 

    if ($("#formation").val()!="aucun" && $("#civilite").val()!="aucun") {
      if ($("#formation").val()=="Master" && $("#civilite").val()=="Mademoiselle") {
          $.ajax({
            url: 'formation_civilite_Master_femme.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
            //  alert(data)              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }if ($("#formation").val()=="DST" && $("#civilite").val()=="Mademoiselle") {
          $.ajax({
            url: 'formation_civilite_DST_femme.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }if ($("#formation").val()=="LICENCE" && $("#civilite").val()=="Mademoiselle") {
          $.ajax({
            url: 'formation_civilite_LICENCE_femme.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else if ($("#formation").val()=="DST_Informatique" && $("#civilite").val()=="Mademoiselle") {
          $.ajax({
            url: 'formation_civilite_DST_femme.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }else if ($("#formation").val()=="L.I.R.T" && $("#civilite").val()=="Mademoiselle") {
          $.ajax({
            url: 'formation_civilite_LIRT_femme.php',
            type: 'POST',
            data: 'formation =' + formation + 'civilite ='+ civilite,
            success: function(data){
              
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                  $("#tableau thead tr").append("<th>Civilite</th>")
                  $("#tableau thead tr").append("<th>effectif</th>")
                  $("#tableau").append("</thead></tr>")
                $("#tableau").append("<tbody></tbody>") 

               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.Formation+"</td>")
                $("#tableau tbody ").append("<td>"+ value.civilite+"</td>")
                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
      }
    }

  })
})        

        // }
        // else if ($("#formation").val()=="aucun") {
        //   $.ajax({
        //     url: 'test1.php',
        //     type: 'POST',
        //     data: 'formation=' + formation,
        //     success: function(data){
              
        //       json = $.parseJSON(data)
        //       $("#tableau").html('')
        //           $("#tableau").append("<thead><tr>")
        //           $("#tableau thead tr").append("<th>Formation</th>")
        //            $("#tableau thead tr").append("<th>Option</th>")
        //           $("#tableau thead tr").append("<th>Niveau</th>")
        //           $("#tableau thead tr").append("<th>effectif</th>")
        //           $("#tableau").append("</thead></tr>")

        //         $("#tableau").append("<tbody></tbody>")  
        //        $.each(json, function(index, value){
        //         $("#tableau tbody").append("<tr></tr>")
        //         $("#tableau tbody ").append("<td>"+ value.formation+"</td>")
        //          $("#tableau tbody ").append("<td>"+ value.opt+"</td>")
        //         $("#tableau tbody ").append("<td>"+ value.annee+"</td>")
        //         $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
        //       })
        //     }

        //   })
        // }

        // if ($("#formation").val()=="aucun" && $("#Nationalite").val()=="aucun") {
        
        //   if ($("#formation").val()=="Master" && $("#Nationalite").val()=="senegalaise") {
        //     alert(formation)
        //     alert(Nationalite);
        //   $.ajax({
        //     url: 'senegalaise.php',
        //     type: 'POST',
        //     data: 'formation=' + formation + 'Nationalite = ' +Nationalite,
        //     success: function(data){
              
        //       json = $.parseJSON(data)
        //       $("#tableau").html('')
        //           $("#tableau").append("<thead><tr>")
        //           $("#tableau thead tr").append("<th>Formation</th>")
                   
        //           $("#tableau thead tr").append("<th>Nationalite</th>")
        //           $("#tableau thead tr").append("<th>effectif</th>")
        //           $("#tableau").append("</thead></tr>")

        //         $("#tableau").append("<tbody></tbody>")  
        //        $.each(json, function(index, value){
        //         $("#tableau tbody").append("<tr></tr>")
        //         $("#tableau tbody ").append("<td>"+ value.formation+"</td>")
                 
        //         $("#tableau tbody ").append("<td>"+ value.Nationalite+"</td>")
        //         $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
        //       })
        //     }

        //   })
        //  }
        // }
        // if ($("#formation").val()=="aucun") {
        //   $.ajax({
        //     url: 'test1.php',
        //     type: 'POST',
        //     data: 'formation=' + formation,
        //     success: function(data){
              
        //       json = $.parseJSON(data)
        //       $("#tableau").html('')
        //           $("#tableau").append("<thead><tr>")
        //           $("#tableau thead tr").append("<th>Formation</th>")
        //            $("#tableau thead tr").append("<th>Option</th>")
        //           $("#tableau thead tr").append("<th>Niveau</th>")
        //           $("#tableau thead tr").append("<th>effectif</th>")
        //           $("#tableau").append("</thead></tr>")

        //         $("#tableau").append("<tbody></tbody>")  
        //        $.each(json, function(index, value){
        //         $("#tableau tbody").append("<tr></tr>")
        //         $("#tableau tbody ").append("<td>"+ value.formation+"</td>")
        //          $("#tableau tbody ").append("<td>"+ value.opt+"</td>")
        //         $("#tableau tbody ").append("<td>"+ value.annee+"</td>")
        //         $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
        //       })
        //     }

        //   })
   

















    </script>
