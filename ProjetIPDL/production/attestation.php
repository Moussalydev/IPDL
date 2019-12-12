  <div class="container body">
     <div class="main_container">
      <div class="right_col" role="main">
      
          <div class="">
            <div class="page-title">
             <div class="row">

              <div>
                <div class="x_panel">
                  <div class="x_content">
                  <div>
                   <h3>GENERATION DES ATTESTION </h3>
                   <div class="clearfix"></div>
                   <br> <br> <br>
                   <?php require_once('uploadFile.php'); ?>
                   <div class="col-lg-12">  
                        <form method="post">

                           <div class="col-xs-4">
                              Numero Etudiant :
                              <input type="text" name="numEdt" id="numEdt" class="select2_group form-control" class="select2_group form-control">
                           </div>

                           <div class="col-xs-4">
                              Date :
                              <input type="text" name="dateDelivre" id="dateDelivre" class="select2_group form-control">
                           </div>


                           <div class="col-xs-4" >
                              Type attestion :
                              <select class="select2_group form-control">  
                                  <option>  Attestion de passage </option>
                                  <option>  Attestion  </option>
                              </select>
                           </div>
            
                        </div><br><br>
                        <div  class="col-xs-offset-11">

                            <input type="submit" name="" value="Valider" class="btn btn-primary">
                        </div>
                    </form>
                  </div>
                  </div>
                    <br />
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    <!-- Dropzone.js -->
    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script type="text/javascript">
       $(document).ready( function(){
        $("#telecharger").click(function(){
          var upload = $("#upload").val()
            $.ajax({
            url: 'uploadFile.php',
            type: 'POST',
            data: 'upload =' + upload,
            success: function(data){
              alert(data)
            
              json = $.parseJSON(data)
              alert(json)      
          
             }
          })
        })
      })      
    </script>