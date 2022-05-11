<?php 
session_start();

	include("./db/functions.php");
	include("./db/connect.php");
	include_once './includes\navbar.php';

	$query = "DELETE FROM cars WHERE id=".$_GET['id'];  //Usuwa nam rekord ktory wlasnie kupilismy
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__); //Jeśli nie zadziała to umiera
?>
<section>
	<div class="container">
		<h1>Własnie zakupiłeś auto!</h1>
		<p><a href="buy.php">Powróć do strony</a></p>
	</div>
</section>
<?php
    include_once './includes\footer.php';
?>