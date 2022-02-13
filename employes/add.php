<a href="employes.php">Voir les congés</a>
<br><br>
<form method="post">

	Prénom : <input type="text" name="prenom" placeholder="Votre prénom"><br><br>
	Nom : <input type="text" name="nom" placeholder="Votre nom"><br><br>
	Téléphone : <input type="text" name="telephone" placeholder="votre téléphone"><br><br>
	Adresse : <input type="text" name="adresse" placeholder="Votre adresse"><br><br>
	Email : <input type="text" name="email" placeholder="Votre email"><br><br>
	Date de naissance : <input type="date" name="date_naissance" placeholder="Votre date de naissance"><br><br>
	
	<input type="submit" name="add" value="Ajouter">
	<input type="reset" name="reset" value="Annuler">
</form>
<?php
if(isset($_POST['add']))
{
  require_once "../config/config.php";
  $prenom=$_POST['prenom'];
  $nom=$_POST['nom'];
  $adresse=$_POST['adresse'];
  $email=$_POST['email'];
  $telephone=$_POST['telephone'];
  $adresse=$_POST['adresse'];
  $date_naissance=$_POST['date_naissance'];
 
  $sql="INSERT INTO employes (prenom,nom,date_naissance,telephone,adresse,email) VALUES ('$prenom','$nom','$date_naissance','$telephone','$adresse','$email')";
  if($mysql_db->query($sql) === false)
  { 
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $mysql_db->error, E_USER_ERROR);
  }  
  else 
  {
    echo "<script>alert('Ajout réussi!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=employes.php\">";
  }
}

?>   