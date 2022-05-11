<?php 
session_start();

	include("./db/functions.php");
	include("./db/connect.php");


	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//Coś zostało z postowane
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
			//Zapisuje do bazy danych
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
			mysqli_query($mysqli, $query);
			header("Location: login.php"); //Jeśli się uda przenosi nas do strony logowania
			die;
		}else
		{
			echo "Prosze wpisać poprawnie informacje!"; //Podane inforamacje zostały źle wprowadzone
		}
	}
?>
<?php
    include_once '../includes\navbar.php';
?>
<section>
	<div class="content">
		<form method="post">
			<h1>Zarejestruj się!</h1>
			<input id="text" type="text" name="user_name" placeholder="Wpisz nazwę użytkownika">
			<input id="text" type="password" name="password" placeholder="Wpisz Hasło">
			<button type="submit" value="login">Zarejestruj się</button>
			<p>Posiadasz już konto? <a href="login.php">Zaloguj się!</a></p>
		</form>
	</div>
</section>
<?php
    include_once './includes\footer.php';
?>