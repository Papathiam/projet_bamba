<a href="add.php">Add</a>
<br><br>
<table border="">
 <tbody>
    <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Action</th>
    </tr>
    <?php
	  // Include config file
	  require_once "config/config.php";

    //include 'config.php';
    $a=mysqli_query($mysql_db,"SELECT * FROM users");
    foreach ($a as $b)
    {
    ?>
    <tr>
       <td><?= $b['id']; ?></td>
       <td><?= $b['username']; ?></td>
       <td>
            <a href="update.php?id=<?= $b['id']; ?>"><b><i>Edit</i></b></a> | 
            <a href="welcome.php?id=<?= $b['id']; ?>" onclick="return confirm('Are you sure?')"><b><i>Delete</i></b></a>
        </td>
    </tr>  
    <?php } ?>                          
 </tbody>
</table>


<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
        .wrapper{ 
        	width: 500px; 
        	padding: 20px; 
        }
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
	</style>
</head>
<body>
	<main>
		<section class="container wrapper">
			<div class="page-header">
				<h2 class="display-5">Welcome home <?php echo $_SESSION['username']; ?></h2>
			</div>

			<a href="password_reset.php" class="btn btn-block btn-outline-warning">Reset Password</a>
			<a href="logout.php" class="btn btn-block btn-outline-danger">Sign Out</a>
		</section>
	</main>
</body>
</html>


<?php
//include 'koneksi.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM users WHERE id='$id'";
    if($mysql_db->query($sql) === false)
    { 
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $mysql_db->error, E_USER_ERROR);
    } 
    else 
    {
      echo "<script>alert('Delete Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=welcome.php\">";
    }
}

?>