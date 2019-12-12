    <div class="container body">
  <div class="main_container">
    <div class="right_col" role="main">
      <div class="clearfix"></div>
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
              <div class="x_title">
               <h2>Tableau de la Statistique</h2>
               <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a></li>
                      <li><a href="#">Settings 2</a></li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                      <div class="clearfix"></div>
              </div>

              <div class="x_content">
                    

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
    <script type="text/javascript">
      $(document).ready( function(){
        $("#terminer").click(function(){
          var prenom = $("#prenom").val()
          var nom = $("#nom").val()
          var formation = $("#formation").val()
          var option = $("#opt").val()
          var civilite = $("#civilite").val()
          var nationalite = $("#nationalite").val()
          var femme = $("#femme").val()
          var homme = $("#homme").val()
          var lieu_naissance = $("#lieu_naissance").val()

     if ($("#formation").val()!="....Veuilliez faire votre choix....") {
          $.ajax({
            url: 'test.php',
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
                $("#tableau tbody ").append("<td>"+ value.formation+"</td>")

                $("#tableau tbody").append("<td>"+ value.effectif+"</td>")

                
              })
            }

          })
        }

         if ($("#prenom").val()!="....Veuilliez faire votre choix...." && $("#nom").val()!="....Veuilliez faire votre choix...." && $("#formation").val()!="....Veuilliez faire votre choix....") {
          $.ajax({
            url: 'effectifGeneralGraph.php',
            type: 'POST',
            data: 'formation=' + formation,
            success: function(data){
            
              json = $.parseJSON(data)
              $("#tableau").html('')
                  $("#tableau").append("<thead><tr>")
                  $("#tableau thead tr").append("<th>ID</th>")
                  $("#tableau thead tr").append("<th>prenom</th>")
                  $("#tableau thead tr").append("<th>nom</th>")
                  $("#tableau thead tr").append("<th>Formation</th>")
                
                  $("#tableau").append("</thead></tr>")

                $("#tableau").append("<tbody></tbody>")  
               $.each(json, function(index, value){
                $("#tableau tbody").append("<tr></tr>")
                $("#tableau tbody ").append("<td>"+ value.ID+"</td>")
                $("#tableau tbody ").append("<td>"+ value.prenom+"</td>")
                $("#tableau tbody ").append("<td>"+ value.nom+"</td>")
                $("#tableau tbody ").append("<td>"+ value.formation+"</td>")
                

                
              })
            }

          })
        }
        })
      })
    </script>
