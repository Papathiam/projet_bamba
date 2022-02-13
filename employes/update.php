<a href="../welcome.php">Voir les employés</a>
<br><br>

<?php
  require_once "../config/config.php";

$a=mysqli_query($mysql_db,"SELECT * FROM employes WHERE id='$_GET[id]'");
$b=mysqli_fetch_array($a,MYSQLI_ASSOC)
?>
<form method="post">
	Prénom : <input type="text" name="prenom" placeholder="Votre prénom" value="<?= $b['prenom']; ?>"><br><br>
	Nom : <input type="text" name="nom" placeholder="Votre nom" value="<?= $b['nom']; ?>"><br><br>
	Téléphone : <input type="text" name="telephone" placeholder="Votre téléphone" value="<?= $b['telephone']; ?>"><br><br>
	Adresse : <input type="text" name="adresse" placeholder="Votre adresse" value="<?= $b['adresse']; ?>"><br><br>
	Email : <input type="text" name="email" placeholder="Votre email" value="<?= $b['email']; ?>"><br><br>
	Date de naissance : <input type="date" name="date_naissance" placeholder="Date de naissance" value="<?= $b['date_naissance']; ?>"><br><br>
	
	<input type="submit" name="update" value="Sauvegarder">
	<input type="reset" name="cancel" value="Annuler">
</form>
<?php
if(isset($_POST['update']))
{
  require_once "../config/config.php";

  $prenom=$_POST['prenom'];
  $nom=$_POST['nom'];
  $email=$_POST['email'];
  $telephone=$_POST['telephone'];
  $adresse=$_POST['adresse'];
  $date_naissance=$_POST['date_naissance'];

  $sql="UPDATE employes SET prenom='$prenom',nom='$nom',date_naissance='$date_naissance',telephone='$telephone',adresse='$adresse',email='$email' WHERE id='$_GET[id]'";
  if($mysql_db->query($sql) === false)
  { 
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $mysql_db->error, E_USER_ERROR);
  }  
  else 
  { 
    echo "<script>alert('Sauvegarde réussie!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=employes.php\">";
  }
}

?>   