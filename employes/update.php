<a href="../welcome.php">Show Data</a>
<br><br>

<?php
  require_once "../config/config.php";

$a=mysqli_query($mysql_db,"SELECT * FROM employes WHERE id='$_GET[id]'");
$b=mysqli_fetch_array($a,MYSQLI_ASSOC)
?>
<form method="post">
	prenom : <input type="text" name="prenom" placeholder="Insert Name" value="<?= $b['prenom']; ?>"><br><br>
	Nom : <input type="text" name="nom" placeholder="Insert Name" value="<?= $b['nom']; ?>"><br><br>
	Telephone : <input type="text" name="telephone" placeholder="Insert Name" value="<?= $b['telephone']; ?>"><br><br>
	Adresse : <input type="text" name="adresse" placeholder="Insert Name" value="<?= $b['adresse']; ?>"><br><br>
	Email : <input type="text" name="email" placeholder="Insert Name" value="<?= $b['email']; ?>"><br><br>
	Date : <input type="date" name="date_naissance" placeholder="Insert Name" value="<?= $b['date_naissance']; ?>"><br><br>
	
	<input type="submit" name="update" value="Update">
	<input type="reset" name="cancel" value="Cancel">
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
    echo "<script>alert('Update Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=employes.php\">";
  }
}

?>   