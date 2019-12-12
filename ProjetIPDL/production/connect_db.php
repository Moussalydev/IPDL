<?php 
	try {
	     $connexion = new PDO ('mysql:host=localhost;dbname=projetIPDL','root','');
	    } catch (Exception $e) {
	      die('Erreur :'.$e->getMessage());
	    }
?>