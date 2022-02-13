
<a href="employes/employes.php">Liste des employés</a> <br>
<a href="pointages/pointages.php">Liste des pointages</a> <br>
<a href="conges/conges.php">Liste des Congés</a> <br>


<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Bienvenue</title>
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
				<h2 class="display-5">Bienvenue <?php echo $_SESSION['username']; ?></h2>
			</div>

			<a href="password_reset.php" class="btn btn-block btn-outline-warning">Réinitialiser le mot de passe</a>
			<a href="logout.php" class="btn btn-block btn-outline-danger">Se déconnecter</a>
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
      echo "<script>alert('Suppression réussie!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=welcome.php\">";
    }
}

?>