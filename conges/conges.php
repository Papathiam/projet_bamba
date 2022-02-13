
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
	<title>CONGES</title>
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

   <a class="btn btn-default" href="../welcome.php">Retour</a> 
   <div class="d-block ml-3">
      <a class="btn btn-success" href="add.php">Ajouter</a>
   </div>
   <br><br>
   <table class="table table-thead text-center">
   <tbody>
      <tr>
         <th>Employé</th>
         <th>Durée</th>
         <th>Action</th>
      </tr>
      <?php
      // Include config file
      require_once "../config/config.php";

      //include 'config.php';
      $a=mysqli_query($mysql_db,"SELECT * FROM conges");
      foreach ($a as $b)
      {
      ?>
      <tr>
         <td><?= $b['employes']; ?></td>
         <td><?= $b['duree']; ?></td>
         <td>
               <a class="btn btn-primary" href="update.php?id=<?= $b['id']; ?>"><b><i>Modifier</i></b></a> | 
               <a class="btn btn-danger" href="conges.php?id=<?= $b['id']; ?>" onclick="return confirm('Vous êtes sûr?')"><b><i>Supprimer</i></b></a>
         </td>
      </tr>  
      <?php } ?>                          
   </tbody>
   </table>



		<section class="container wrapper">
			<div class="page-header">
				<h2 class="display-5">Bienvenue <?php echo $_SESSION['username']; ?></h2>
			</div>
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
    $sql="DELETE FROM conges WHERE id='$id'";
    if($mysql_db->query($sql) === false)
    { 
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $mysql_db->error, E_USER_ERROR);
    } 
    else 
    {
      echo "<script>alert('Suppression réussie!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=conges.php\">";
    }
}

?>