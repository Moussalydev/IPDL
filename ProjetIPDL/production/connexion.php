<?php
require_once('connect_db.php');	  
if (isset($_POST['connecter'])){
$username = ($_POST['username']);
$password = ($_POST['password']);
$query=$connexion->prepare("SELECT * FROM administrateur where username=? AND password=?");
$query->execute(array($username ,$password ));
		$fetch=$query->fetch();
		$count=$query->rowCount();
		if ($count==1) {
			if ($fetch['etat']==1) {
				if ($fetch['actif']==1) {
					$_SESSION['username'] = $username;
					$_SESSION['id'] = $fetch['id'];
					$_SESSION['username'] = $fetch['username'];
					$_SESSION ['password'] = $fetch['password'];	
					header("Location: production/inde.php");
				}else{
					echo '<br>'.'<center>'.'<div class="erreur"><p class="text-danger text-danger1">'.'<strong>'. "Vous devez activer votre compte avant de l'utiliser".'</strong>'.'</p></div>'.'</center>';
				}
				
			}else{
				echo '<br>'.'<center>'.'<div class="erreur"><p class="text-danger text-danger1">'.'<strong>'.'l\'état à changer'.'</strong>'.'</p></div>'.'</center>';
			}	
	    }else{
	     echo '<br>'.'<center>'.'<div class="erreur"><p class="text-danger text-danger1">'.'<strong>Login et/ou mot de passe incorrect(s)</strong>'.'</p></div>'.'</center>';
	    }
}

?>

