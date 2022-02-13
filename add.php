<a href="welcome.php">Show Data</a>
<br><br>
<form method="post">
	ID : <input type="text" name="id" placeholder="Insert ID"><br><br>
	Name : <input type="text" name="username" placeholder="Insert Name"><br><br>
	Password : <input type="password" name="password" placeholder="Insert Password"><br><br>
	
	<input type="submit" name="add" value="Add">
	<input type="reset" name="reset" value="Cancel">
</form>
<?php
if(isset($_POST['add']))
{
  require_once "config/config.php";
  $id=$_POST['id'];
  $username=$_POST['username'];
  $password=$_POST['password'];
 
  $sql="INSERT INTO users (id,username,password) VALUES ('$id','$username','$password')";
  if($mysql_db->query($sql) === false)
  { 
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $mysql_db->error, E_USER_ERROR);
  }  
  else 
  {
    echo "<script>alert('Add Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=welcome.php\">";
  }
}

?>   