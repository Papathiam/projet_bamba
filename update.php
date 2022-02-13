<a href="welcome.php">Show Data</a>
<br><br>

<?php
  require_once "config/config.php";

$a=mysqli_query($mysql_db,"SELECT * FROM users WHERE id='$_GET[id]'");
$b=mysqli_fetch_array($a,MYSQLI_ASSOC)
?>
<form method="post">
	ID : <input type="text" name="id" placeholder="Insert ID" value="<?= $b['id'] ?>"><br><br>
	Name : <input type="text" name="username" placeholder="Insert Name" value="<?= $b['username']; ?>"><br><br>
	
	<input type="submit" name="update" value="Update">
	<input type="reset" name="cancel" value="Cancel">
</form>
<?php
if(isset($_POST['update']))
{
  require_once "config/config.php";

  $id=$_POST['id'];
  $username=$_POST['username'];

  $sql="UPDATE users SET id='$id',username='$username' WHERE id='$_GET[id]'";
  if($mysql_db->query($sql) === false)
  { 
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $mysql_db->error, E_USER_ERROR);
  }  
  else 
  { 
    echo "<script>alert('Update Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=welcome.php\">";
  }
}

?>   