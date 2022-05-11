<?php 
session_start();

	include("./db/functions.php");
	include("./db/connect.php");
	include_once './includes\navbar.php';

	$user_data = check_login($mysqli);

?>
<section>
	<div class="background">
		<div class="desc">
			<p>Witaj, <?php echo $user_data['user_name']; ?></p>
			<button><a href="buy.php">Zobacz naszą ofertę!</a></button>
		</div>
	</div>
</section>
<?php
    include_once './includes\footer.php';
?>