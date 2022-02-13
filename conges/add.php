<a href="conges.php">Retour</a>
<br><br>
<form method="post">

	Employe : <input type="text" name="employes" placeholder="Votre nom"><br><br>
	Duree : <input type="number" name="duree" placeholder="La durée du congé"><br><br>
	
	<input type="submit" name="add" value="Ajouter">
	<input type="reset" name="reset" value="Annuler">
</form>

<?php
if(isset($_POST['add']))
{
  require_once "../config/config.php";
  $employes=$_POST['employes'];
  $duree=$_POST['duree'];
  
 
  $sql="INSERT INTO conges (employes,duree) VALUES ('$employes','$duree')";
  if($mysql_db->query($sql) === false)
  { 
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $mysql_db->error, E_USER_ERROR);
  }  
  else 
  {
    echo "<script>alert('Ajout réussi!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=conges.php\">";
  }
}

?>   