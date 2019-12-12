<?php
		try {
	     $connexion = new PDO ('mysql:host=localhost;dbname=statistiques','root','');
	    } catch (Exception $e) {
	      die('Erreur :'.$e->getMessage());
	    }

		function Globale($connexion){
			
			$json=array();
			$i=0;
			$resultat = $connexion->query("select count(ID) from a");
		  	while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
		   		$json[$i] = $donnee;
		   		$i++;
		    } 
		    echo json_encode($json)."\n\n";
		}



		function Statistique_Niveau($connexion){
			
			$json=array();
			$i=0;
			$resultat = $connexion->query("select annee,count(ID) from a group by (annee)");
		  	while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
		   		$json[$i] = $donnee;
		   		$i++;
		    } 
		    echo json_encode($json)."\n\n";
		}

		function Statistique_Option($connexion){
			
		
			$resultat=$connexion->query("SELECT `option` , count( ID ) FROM A GROUP BY `option` ");

			$json=array();
			$i=0;
		  	while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
		   		$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		function Statistique_Cycle($connexion,$cycle){

			$resultat=$connexion->query("SELECT `option` , count( ID ) FROM A WHERE `option` LIKE '%$cycle%' ");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}


		function Statistique_Formation($connexion){
			
			$json=array();
			$i=0;
			$resultat = $connexion->query("select Formation,count(ID) from A group by (Formation)");
		  	while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
		   		$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r (json_encode($json))."\n\n";
		}



		function sta_natio($connexion){
			$sortie=$connexion->query("select nationalite,count(nationalite) as k from A group by (nationalite)");
			$json=array();
			$i=0;
			while ($res=$sortie->fetch(PDO::FETCH_ASSOC)){
				$json[$i]=$res;
					$i++;
			 //echo var_dump($res);
			}

			//echo json_encode($json);
			print_r(($json));


	}



	 function Statistique_jour_soir($connexion){
	 	
	    $json=array();
	    $i=0;
	    $resultat = $connexion->query("select jour_soir,count(ID) from A group by (jour_soir)");
	    while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
	        $json[$i] = $donnee;
	        $i++;
	    }
	    echo json_encode($json)."\n\n";
	}

		
		function Statistique_Civilite($connexion){
			
			$json=array();
			$i=0;
			$resultat = $connexion->query("select civilite,count(ID) from A group by (civilite)");
		  	while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
		   		$json[$i] = $donnee;
		   		$i++;
		    } 
		    echo json_encode($json)."\n\n";
		}


		function Statistique_Boursier($connexion){
			
	    $json=array();
	    $i=0;
	    $resultat = $connexion->query("select Boursier,COUNT(ID) from A group by (Boursier)");
	    while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
	        $json[$i] = $donnee;
	        $i++;
	    }
	    echo json_encode($json)."\n\n\n\n";
	}



		function Statistique_Cycle_Niveau($connexion,$cycle){
		$resultat=$connexion->query("SELECT `annee` , count( `annee` ) FROM `a` WHERE `Formation` LIKE '$cycle%'
	    GROUP BY `annee`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		function Statistique_Cycle_Option($connexion,$cycle){
		$resultat=$connexion->query("SELECT `option` , count( `option` ) FROM `a` WHERE `Formation` LIKE '$cycle%'
	    GROUP BY `option`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}
		function Statistique_Cycle_Formation($connexion,$cycle){
		$resultat=$connexion->query("SELECT `Formation` , count( `Formation` ) FROM `a` WHERE `Formation` LIKE '$cycle%'
	    GROUP BY `Formation`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}
		function Statistique_Cycle_Option_Formation($connexion,$cycle,$option){
		$resultat=$connexion->query("SELECT `option` , `Formation` , count( `Formation` ) FROM a
			WHERE `Formation` LIKE '$cycle%'
				AND `option` like '%$option%'
				GROUP BY 'Formation'");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}
		function Statistique_Cycle_Option_Formation_Niveau($connexion,$cycle,$option){
		$resultat=$connexion->query("SELECT `option` , `Formation` , `annee` , count( `annee` ) FROM a
			WHERE `Formation` LIKE '$cycle%'
			AND `option` LIKE '%$option%'
			GROUP BY `annee`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}


		


         
	    

	     //Globale($connexion);
		//Statistique_Niveau($connexion);
		//Statistique_Option($connexion);
		//Statistique_Formation();
		//Statistique_Civilite();
		//Statistique_Boursier();
	    //sta_natio($connexion);
	    //return_nationalite();
	    //Statistique_Cycle($connexion,"GENIE");
	    //Statistique_jour_soir();
	   // Statistique_Cycle_Niveau($connexion,"Master");
		//Statistique_Cycle_Formation($connexion,"Master");
		//Statistique_Cycle_Option($connexion,"Master");
	   // Statistique_Cycle_Option_Formation($connexion,"Master","GENIE LOGICIEL ET SYSTEME");
	   // Statistique_Cycle_Option_Formation_Niveau($connexion,"DST","INFORMATIQUE");
   			

		
			function Statistique_Option_Formation($connexion,$Formation){
      	/*
      	@parm Formation (on lui donne la formation(Master) en parametre)
      	@Resultat (Effectif des etudiants en Master selon leur option(Informatique ou télécom))
		*/
		$resultat=$connexion->query("SELECT `option` , `Formation` , count( `option` ) as Effectif FROM a
			WHERE `Formation` LIKE '%$Formation%'
			GROUP BY `option`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}


		function Statistique_Option_Formation_Niveau($connexion,$Formation){
			/*
      	@parm Formation (on lui donne la formation(Master) en parametre)
      	@Resultat (Effectif des etudiants en Master selon leur option(Informatique ou télécom) et Niveau(1er ou 2iém))
		*/
		$resultat=$connexion->query("SELECT `option` , `Formation` , count( `option` ) as Effectif FROM a
			WHERE `Formation` LIKE '%$Formation%'
			GROUP BY `option`,`annee`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		  function Statistique_Cycle_Niveau_civilite($connexion,$cycle){
		  		/*
      	@parm cycle (on lui donne le cycle(DST ou Master) en parametre)
      	@Resultat (Effectif des etudiants en Master selon leur niveau(1er ou 3iém) et civilite(madame ou monsieur))
		*/
		$resultat=$connexion->query("SELECT `annee` , `civilite` , count( `annee` ) as Effectif FROM `a`
			WHERE `Formation` LIKE '$cycle%'
			GROUP BY `annee` , `civilite`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		function Statistique_Cycle_Option_civilite($connexion,$cycle){
			/*
      	@parm cycle (on lui donne le cycle(DST ou Master) en parametre)
      	@Resultat (Effectif des etudiants selon l'option(Informatique ou Telecom reseaux) et civilite(madame ou monsieur))
		*/
		$resultat=$connexion->query("SELECT `option` , `civilite`,count( `option` ) as Effectif FROM `a` WHERE `Formation` LIKE '$cycle%'
	    GROUP BY `option`,`civilite`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		function Statistique_Cycle_Formation_Civilite($connexion,$cycle){
			/*
      	@parm cycle (on lui donne le cycle(DST ou Master) en parametre)
      	@Resultat (Effectif des etudiants selon la formation( DST Informatique ou DST Telecom reseaux) et civilite(madame ou monsieur))
		*/
		$resultat=$connexion->query("SELECT `Formation` , `civilite`, count( `Formation` ) as Effectif FROM `a` WHERE `Formation` LIKE '$cycle%'
	    GROUP BY `Formation`,`civilite`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		function Statistique_Cycle_Option_Formation_Civilite($connexion,$cycle,$option){
			/*
      	@parm cycle (on lui donne le cycle(DST ou Master) en parametre)
      	@Resultat (Effectif des etudiants selon l'option (Informatique ou Telecom reseau), la formation( DST Informatique ou DST Telecom reseaux) et civilite(madame ou monsieur))
		*/
		$resultat=$connexion->query("SELECT `option` , `Formation` , `civilite`, count( `Formation` ) as Effectif FROM a
			WHERE `Formation` LIKE '$cycle%'
				AND `option` like '%$option%'
				GROUP BY 'Formation',`civilite`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		function Statistique_Cycle_Option_Formation_Niveau_Civilite($connexion,$cycle,$option){
		$resultat=$connexion->query("SELECT `option` , `Formation` , `annee` ,`civilite`, count( `annee` ) as Effectif FROM a
			WHERE `Formation` LIKE '$cycle%'
			AND `option` LIKE '%$option%'
			GROUP BY `annee`, `civilite`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		function Statistique_Cycle_Niveau_civilite_Nationnalite($connexion,$cycle){
		  		/*
      	@parm cycle (on lui donne le cycle(DST ou Master) en parametre)
      	@Resultat (Effectif des etudiants en Master selon leur niveau(1er ou 3iém) et civilite(madame ou monsieur) et Nationalite(senegalaise,togolais...))
		*/
		$resultat=$connexion->query("SELECT `annee` , `civilite` ,`nationalite`, count( `annee` ) as Effectif FROM `a`
			WHERE `Formation` LIKE '$cycle%'
			GROUP BY `annee` , `civilite`,`nationalite`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}
		function Statistique_Cycle_Option_civilite_Nationalite($connexion,$cycle){
			/*
      	@parm cycle (on lui donne le cycle(DST ou Master) en parametre)
      	@Resultat (Effectif des etudiants selon l'option(Informatique ou Telecom reseaux) et civilite(madame ou monsieur) et Nationalite(senegalaise,togolais...))
		*/
		$resultat=$connexion->query("SELECT `option` , `civilite`,`nationalite`,count( `option` ) as Effectif FROM `a` WHERE `Formation` LIKE '$cycle%'
	    GROUP BY `option`,`civilite`,`nationalite`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		function Statistique_Cycle_Formation_Civilite_Nationalite($connexion,$cycle){
			/*
      	@parm cycle (on lui donne le cycle(DST ou Master) en parametre)
      	@Resultat (Effectif des etudiants selon l'option(Informatique ou Telecom reseaux) et civilite(madame ou monsieur) et Nationalite(senegalaise,togolais...))
		*/
		$resultat=$connexion->query("SELECT `option` , `civilite`,`nationalite`,count( `option` ) as Effectif FROM `a` WHERE `Formation` LIKE '$cycle%'
	    GROUP BY `option`,`civilite`,`nationalite`");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

		function Statistique_Cycle_Option_Formation_Civilite_Nationalite($connexion,$cycle,$option){
			/*
      	@parm cycle (on lui donne le cycle(DST ou Master) en parametre)
      	@Resultat (Effectif des etudiants selon l'option (Informatique ou Telecom reseau), la formation( DST Informatique ou DST Telecom reseaux) et civilite(madame ou monsieur) et Nationalite(senegalaise,togolais...))
		*/
		$resultat=$connexion->query("SELECT `option` , `Formation` , `civilite`,`nationalite`, count( `Formation` ) as Effectif FROM a
			WHERE `Formation` LIKE '$cycle%'
				AND `option` like '%$option%'
				GROUP BY 'Formation',`civilite`,nationalite");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r($json);
		}

      

      



		//Statistique_Option_Formation($connexion,"Master 2");
	    //Statistique_Option_Formation_Niveau($connexion,"Master");
	    //Statistique_Cycle_Niveau_civilite($connexion,"DST");
	    //Statistique_Cycle_Option_civilite($connexion,"DST");
	   // Statistique_Cycle_Formation_Civilite($connexion,"DST");
		//Statistique_Cycle_Option_Formation_Civilite($connexion,"DST","INFORMATIQUE");
		//Statistique_Cycle_Option_Formation_Niveau_Civilite($connexion,"DST","INFORMATIQUE");
 		//Statistique_Cycle_Niveau_civilite_Nationnalite($connexion,"DST");
		//Statistique_Cycle_Option_civilite_Nationalite($connexion,"Master");
		//Statistique_Cycle_Formation_Civilite_Nationalite($connexion,"Licence");
		//Statistique_Cycle_Option_Formation_Civilite_Nationalite($connexion,"DST","INFORMATIQUE");
	?>
