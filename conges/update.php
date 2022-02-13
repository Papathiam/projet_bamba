<a href="conges.php">Show Data</a>
<br><br>

<?php
  require_once "../config/config.php";

$a=mysqli_query($mysql_db,"SELECT * FROM conges WHERE id='$_GET[id]'");
$b=mysqli_fetch_array($a,MYSQLI_ASSOC)
?>
<form method="post">
employes : <input type="text" name="employes" placeholder="Insert Name" value="<?= $b['employes']; ?>"><br><br>
Duree : <input type="number" name="duree" placeholder="Insert Name" value="<?= $b['duree']; ?>"><br><br>
	
	<input type="submit" name="update" value="Update">
	<input type="reset" name="cancel" value="Cancel">
</form>
<?php
if(isset($_POST['update']))
{
  require_once "../config/config.php";

  $employes=$_POST['employes'];
  $duree=$_POST['duree'];

  $sql="UPDATE conges SET employes='$employes',duree='$duree' WHERE id='$_GET[id]'";
  if($mysql_db->query($sql) === false)
  { 
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $mysql_db->error, E_USER_ERROR);
  }  
  else 
  { 
    echo "<script>alert('Update Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=conges.php\">";
  }
}

?>   