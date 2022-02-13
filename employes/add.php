<a href="employes.php">Show Data</a>
<br><br>
<form method="post">

	Prenom : <input type="text" name="prenom" placeholder="Insert Name"><br><br>
	Nom : <input type="text" name="nom" placeholder="Insert Name"><br><br>
	Telephone : <input type="text" name="telephone" placeholder="Insert Name"><br><br>
	Adresse : <input type="text" name="adresse" placeholder="Insert Name"><br><br>
	Email : <input type="text" name="email" placeholder="Insert Name"><br><br>
	Date : <input type="date" name="date_naissance" placeholder="Insert Name"><br><br>
	
	<input type="submit" name="add" value="Add">
	<input type="reset" name="reset" value="Cancel">
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
    echo "<script>alert('Add Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=employes.php\">";
  }
}

?>   