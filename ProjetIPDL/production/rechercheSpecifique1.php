<script type="text/javascript">
     
     function cocher(){
     	var i;
     	
        if(document.getElementById('i').checked)
        	form.submit();
     
   
 	}
 	
	</script>
<?php 
	$tab=array(0,0,0,0,0,0,0);
	$i=0;
	
	$requete=$db->query("SHOW columns from a");
   
	
	

	if(isset($_POST['1'])){

	    $date=htmlspecialchars($_POST['1']);
	    $tab[$i]++;
	  
	}
	if(isset($_POST['2'])){

	  $Boursier=htmlspecialchars($_POST['2']);
	  $tab[$i+1]++;
	}

	if(isset($_POST['3'])){

		$lieu=htmlspecialchars($_POST['3']);
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
	                  	 $lieu=$_POST['3'];
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
	 <br>
	 <?php 
	      
	         if(!isset($_POST['6'])){
	         	echo "<br>";
	         	echo "";
	         }
	         else{

	          $reponse=$db->query("SELECT * from a where Formation= '".$_POST['6']."'");
	          
	          
	         
	          while($donnes=$reponse->fetch()){

					echo'<table border=1px width=50%>';
					
					    echo'<tr>';
				    echo "<td>"; echo "ID"; echo "<br>"; echo $donnes['ID']; echo "</td>";
					        
			        echo '<td>';echo "Nom"; echo"<br>"; echo htmlspecialchars($donnes['Nom']); echo "</td>";
			        echo '<td>'; echo "Prenom"; echo"<br>"; echo htmlspecialchars($donnes['prenom']); echo "</td>";

					if(isset($date)){
						echo'<td>'; echo"Naissance"; echo"<br>"; echo "le".$donnes['naissance'];   
						echo'</td>';}
					if(isset($_POST['3'])){
						echo'<td>'; echo"Lieu"; 
						echo"<br>"; echo  $donnes['lieu'];
						   echo'</td>';}
				    if(isset($Boursier)){
				    	echo'<td>';    
				    	echo "Etudiant_boursier"; echo"<br>"; echo $donnes['Boursier']; 
				    	 echo'</td>';}
					if(isset($option)){
					 echo'<td>'; echo "Option"; echo "<br>"; echo $donnes['opt'];
					   echo'</td>';}
					if(isset($_POST['6']) && $_POST['6']==$donnes['Formation']){ echo'<td>'; echo "Formation"; echo "<br>"; echo $donnes['Formation'];  echo'</td>';}
					if(isset($tel)){echo'<td>';  echo "Téléphone"; echo "<br>"; echo $donnes['Mobile'];   echo'</td>';}

					if(isset($montant)){echo'<td>';  echo "Montant restant"; echo "<br>"; echo $donnes['M_restant'];   echo'</td>';}

							
						echo'</tr>';
					 echo '</table>';
					}
			}
		//}
				
			
	     ?>