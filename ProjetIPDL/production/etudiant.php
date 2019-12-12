<div class="container body">
    <div class="main_container">
        
        <!-- page content -->                
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

                <div class="x_panel">
                 <div class="x_title">
                 <div class="col-xs-offset-4">
                    <h2>LES TABLEAUX DES ETUDIANTS</h2>
                  </div>  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="clearfix"></div>
                      <div class="col-xs-offset-3">
                      </div>
                    </div>

                    <div class="x_content">
                   <!---- Debut des tableau---->


<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
  <title></title>
  <style type="text/css">
  body{
    background-color: #EDEDED;
  }

  img{
    margin-left: 10%;

  }
 
  .titre{
    color: #2A3F54;
    font-size: large;

  }
  .mybuttun{
    padding: 18%;
    margin-top: 25%;  
  }
  </style>
  <script type="text/javascript">
     
     function cocher()
     {
      var i;
      
        if(document.getElementById('i').checked)
          form.submit(); 
    }
   


  </script>
</head>

<div class="monlogo col-xs-offset-2">
    <img src="logoESP.png" style="margin-left:10%;"></img>
</div>

<div class="col-lg-12 col-xs-offset-1">

    <?php 
         include('connect_db.php');

         $req=$connexion->query("SELECT distinct formation from a");

     ?>

  <form method="post" action="#" class="form-horizontal">
    <table>
     <tbody>
     <div class="col-xs-offset-1">
      <div class="col-xs-4">
       <select name="6" id='6' class="select2_group form-control" onselect="cocher();" >
        <option value="Formation"> Formations </option>
          <?php
           while($resultat=$req->fetch())
              {
               $i=0;
                  echo "<option value='".$resultat[$i]."'>"; echo $resultat[$i]; echo "</option>"; echo"<br>";
                    $i++;

              } 
               echo "<option value='toutes'>"; echo "toutes"; echo "</option>";
               echo "</select>";echo "<br>";
            ?>
        </div>

          <div class="col-xs-4">
           <select name="10" id='10' class="select2_group form-control" onselect="cocher();" >
              <option value="PLAN">PLAN </option>
              <option value="JOUR">JOUR </option>
              <option value="SOIR">SOIR </option>
          </select>
        </div>
       </div>
      <br>
      <tr>
      <td>
      <input type="checkbox" id="1" name="1" value="naissance" class="flat"> : Date de Naissance
      </td>

      <td>
      <input type="checkbox" id="3" name="3" value="lieu_naissance" class="flat"> : Lieu de Naissance 
     </td>

      <td>
        <input type="checkbox" id="2" name="2" value="Boursier" class="flat"> : Boursier
     </td>
     
     <td>
         <input type="checkbox" id="4" name="4" value="opt" class="flat"> : Option 
     </td>

      <td>
        <input type="checkbox" id="5" name="5" value="Mobile" class="flat"> : Telephone 
      </td>


        <td>
            <input type="checkbox" id="7" name="7" value="M_restant" class="flat"> : Montatnt restant
        </td>
        
         <td>
            <input type="checkbox" id="9" name="9" value="nbrh" class="flat"> : Civilite 
          </td>
      

        <td>
            <input type="checkbox" id="11" name="11" value="Nationalite" class="flat"> : Nationalite 
       </td>
        </tr>
      
     </tbody>
      <div class="myButtun">
            <input type="submit" value="valider" class="btn btn-info" onclick="cocher()">
      </div>
    </table>

        
      
    </form>
  </div>
<table>
<table> 
  <div class="col-lg-12">
  <?php 
  $tab=array(0,0,0,0,0,0,0,0,0,0);
  $i=0;

  if(isset($_POST['8'])){
     $genre=$connexion->query("SELECT count(ID) from a where");
    }
    
  if(isset($_POST['1'])){

      $date=htmlspecialchars($_POST['1']);
      $tab[$i]++;
    
  }
  if(isset($_POST['2'])){

    $Boursier=htmlspecialchars($_POST['2']);
    $tab[$i+1]++;
  }

  if(isset($_POST['3'])){

    $lieu_naissance=htmlspecialchars($_POST['3']);
    $tab[$i+2]++;
    
  }
  if(isset($_POST['4'])){

    $option=htmlspecialchars($_POST['4']);
    $tab[$i+3]++;
  }
  if(isset($_POST['5'])){

    $tel=htmlspecialchars($_POST['5']);
    $tab[$i+4]++;
  }
  if(isset($_POST['6'])){

    $forma=htmlspecialchars($_POST['6']);
    $tab[$i+5]++;
  }
  if(isset($_POST['7'])){

    $montant=htmlspecialchars($_POST['7']);
    $tab[$i+6]++;
  }
   if(isset($_POST['10'])){

    $heure=htmlspecialchars($_POST['10']);
    $tab[$i+9]++;
  }
  //repertorier les cages cochés
  $pos=array();
  
  for($i=0; $i<6; $i++){
    for($j=$i; $j<6; $j++){
       if($tab[$j]==1){
                   $pos[$j]=$j;   
                    if($pos[$j]==0)
                       $date=$_POST['1'];
                    if($pos[$j]==1)
                       $Boursier=$_POST['2'];
                    if($pos[$j]==2)
                       $lieu_naissance=$_POST['3'];
                    if($pos[$j]==3)
                       $option=$_POST['4'];
                    if($pos[$j]==4)
                       $tel=$_POST['5'];
                    if($pos==5)
                       $forma=$_POST['6']; 
                     if($pos==6)
                       $montant=$_POST['7'];                
                  }
             }
      $i=$j;
    }
   ?>
   <?php 
        
     if(!isset($_POST['6'])){
  
     }
      else if(!isset($_POST['9']) && $_POST['10']=='PLAN' && !isset($_POST['11'])){
          $reponse=$connexion->query("SELECT * from a where Formation= '".$_POST['6']."'");

      //Control de non saisi
      if($_POST['6']=='Formation' && $_POST['10']=='PLAN'  ){
        echo " ";
      }
      else{
      echo "<br>";
      echo "<table class='table table-condensed table-hover table-striped'>";
      echo"<tr class='success'>";
      echo "<th>"; echo  "Matricule"; echo "</th>";
      echo"<th>";  echo "Nom";  echo "</th>";
      echo"<th>";  echo "Prenom"; echo "</th>";
      echo"<th>"; if(isset($date)) echo "Date naissance"; echo "</th>";
      echo"<th>"; if(isset($_POST['3'])) echo "Lieu_naissance naissance"; echo "</th>";
      echo"<th>"; if(isset($Boursier))echo "Boursier"; echo "</th>";
      echo"<th>"; if(isset($option)) echo "Option"; echo "</th>";
      echo"<th>"; if(isset($tel)) echo "Telephone"; echo "</th>";
      echo"<th>"; echo "Formation"; echo "</th>";
      echo"<th>";  echo "payement_Restant";     echo "</th>";
      echo"<th>";  echo "Civilité";     echo "</th>";
      echo"</tr>";    
            while($donnes=$reponse->fetch()){
                    $mat=$donnes['ID'];
                    $nom=$donnes['Nom'];
                    $pren=$donnes['prenom'];
                    $dn=$donnes['naissance'];
                    $l=$donnes['lieu_naissance'];
                    $op=$donnes['opt'];
                    $tl=$donnes['Mobile'];
                    $mres=$donnes['M_restant'];
                    $bour=$donnes['Boursier'];
                    $form=$donnes['Formation'];     
       ?>
      <tr>
        <td>  <?php echo $mat; ?></td>
        <td>  <?php echo $nom; ?>  </td>
        <td>  <?php echo $pren; ?>  </td>
        <td>  <?php if(isset($date)) echo $dn; ?> </td>
        <td>  <?php if(isset($_POST['3'])) echo $l; ?> </td>
        <td>  <?php if(isset($Boursier)) echo $bour; ?>   </td>
        <td>  <?php if(isset($option)) echo $op; ?>    </td>
        <td>  <?php if(isset($tel)) echo $tl; ?>       </td>
        <td>  <?php if(isset($_POST['6'])) echo $form; ?> </td>
        <td>  <?php if(isset($_POST['7'])) echo $mres; ?>         </td>
        <td> <?php if(isset($_POST['8'])){ if($donnes['civilite']=="Monsieur") echo"Homme"; else echo "Femme";}  ?>       </td>
      </tr>

      <?php 
        }
       }
     }
      //fin de control de non saisi
      else
          if($_POST['6']=='toutes' && !isset($_POST['11'])){
          $req=$connexion->query("SELECT  distinct Formation from a where civilite= 'Monsieur'");
          echo "<br>"; 
          
          echo "<table class='table table-condensed'>";
          echo "<tr>";
          echo "<th>"; echo "Formation"; echo "</th>";
          echo "<th>"; echo "Homme"; echo "</th>";
          echo "<th>"; echo "Femme"; echo "</th>";
          while($donnes=$req->fetch()){
  $req2=$connexion->query("SELECT count(ID) from a where Formation='".$donnes['Formation']."' and civilite='Monsieur'");
  $req3=$connexion->query("SELECT count(ID) from a where Formation='".$donnes['Formation']."'and civilite!='Monsieur'");

          $donnes2=$req2->fetch();
          $donnes3=$req3->fetch();
            echo "</tr>";
            echo "<tr>";
            echo "<td>"; echo  $donnes['Formation']; echo "</td>";

            echo "<td>"; echo $donnes2[0];   echo "</td>";
            echo "<td>"; echo $donnes3[0];   echo "</td>";
            echo "</tr>";
          }   
      }
      //statistiques genre d'une formation précise
       else 
        if($_POST['6']!='toutes' && !isset($_POST['11']) && $_POST['10']=='PLAN'){
        $req=$connexion->query("SELECT  count(ID), Formation from a where civilite= 'Monsieur' and Formation='".$_POST['6']."'");
        $req2=$connexion->query("SELECT  count(ID), Formation from a where civilite!= 'Monsieur' and Formation='".$_POST['6']."'");
         $donnes=$req->fetch(); 
         $donnes2=$req2->fetch();  
          echo "<table class='table table-condensed'>";
          echo "<tr>";
          echo "<br>";
          echo "<br>";
            echo "<th>"; echo "Formation"; echo "</th>";
            echo "<th>"; echo "Homme"; echo "</th>";
            echo "<th>"; echo "Femme"; echo "</th>";
          echo "</tr>";
          echo "<tr>";
            echo "<td>"; echo $donnes['Formation']; echo "</td>";
            echo "<td>"; echo $donnes[0]; echo "</td>";
            echo "<td>"; echo $donnes2[0]; echo "</td>";
          echo "</tr>";


          echo "</table>";

        }

      //fin
      else if(isset($_POST['10']) && !isset($_POST['11'])){

        $requete=$connexion->query("SELECT count(ID), Formation from a where jour_soir='".$heure."' and Formation='".$_POST['6']."'");
           echo "<br>";
           echo "<table class='table table-condensed table-hover'>";
          echo "<tr>";
          echo "<th>"; echo "Formation"; echo "</th>";
          echo "<th>"; echo "Cour du"." ".$heure; echo "</th>";
          
          while($donnes=$requete->fetch()){
           if(!isset($donnes['Formation']) && $heure!='PLAN'){
            echo "Personne ne fait de cour le".$heure ."dans cette classe";
           }
           else{
            echo "</tr>";
            echo "<tr>";

            echo "<td>"; echo  $donnes['Formation']; echo "</td>";
            echo "<td>"; echo $donnes[0];   echo "</td>";
            echo "</tr>";
            }
          }
        }
        //requetes sur les nationalités
        if(isset($_POST['11']) && $_POST['6']!='toutes'){
          $requete=$connexion->query("SELECT count(ID), Formation from a where Formation ='".$_POST['6']."' and nationalite='senegalaise'");
          echo "<br>";
          echo "<br>";
          echo "<table class='table table-condensed table-bordered'>";
          echo "<tr>";
          echo "<th>"; echo "Formation"; echo "</th>";
          echo "<th>"; echo "Senegalais"; echo "</th>";
          echo "<th>"; echo "Etrangers"; echo "</th>";
          
        $donnes=$requete->fetch();
        $requete2=$connexion->query("SELECT count(ID) from a where Formation='".$_POST['6']."' and nationalite!='senegalaise'");
        $donnes2=$requete2->fetch();
            echo "</tr>";
            echo "<tr>";
                  echo "<td>"; echo  $donnes['Formation']; echo "</td>";
                  echo "<td>"; echo $donnes[0];   echo "</td>";
                  echo "<td>"; echo $donnes2[0];   echo "</td>";
            echo "</tr>";
            echo "</table>";
          }
        ?>
       </table>
    </table>

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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

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

   
