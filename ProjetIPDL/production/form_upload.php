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
                   <h3>IMPORTATION DES FICHIERS XLS, XLSX, CSV </h3>
                   <div class="clearfix"></div><br><br><br>
                   <?php require_once('uploadFile.php'); ?>
                   <div class="col-xs-6">  
                    <form method="get" action="uploadFile.php">

                     <div class="col-xs-6">
                        <input type="file" name="fichier" id="fichier" class="select2_group form-control">
                     </div>

                    </div class="col-xs-6">
                        <input type="submit" name="upload" value="Importer" class="btn btn-primary">
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