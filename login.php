<?php
    include_once './includes\navbar.php';
	if(isset($_SESSION['url'])) 
   $url = $_SESSION['url']; // holds url for last page visited.
else 
   $url = "student_account.php"; 

header("Location: http://example.com/$url"); 
?>
<section>
	<div class="content">
		<form method="POST">
			<h1>Zaloguj się!</h1>
			<input id="text" type="text" name="user_name" placeholder="Wpisz nazwę użytkownika">
			<input id="text" type="password" name="password" placeholder="Wpisz Hasło">
			<button type="submit" value="login">Zaloguj się</button>
			<p>Nie posiadasz konta? <a href="register.php">Zarejestruj się!</a></p>
		</form>
		<?php 
		session_start(); //Ropoczyna sesje

			include("./db/functions.php"); //Includuje nam skrypt
			include("./db/connect.php"); //Includuje nam baze dancyh

			if($_SERVER['REQUEST_METHOD'] == "POST") {
				// Coś zostało za postowane
				$user_name = $_POST['user_name']; 
				$password = $_POST['password']; 
				if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
					// Zczytuje nam z bazy danych uzytkownikow
					$query = "select * from users where user_name = '$user_name' limit 1";
					$result = mysqli_query($mysqli, $query);
					if($result) {
						if($result && mysqli_num_rows($result) > 0) {
							$user_data = mysqli_fetch_assoc($result);
							if($user_data['password'] === $password) {
								$_SESSION['user_id'] = $user_data['user_id'];
								header("Location: index.php"); //Jeśli się uda przenosi do strony głownej
								die;
							}
						}
					}
					echo "Zła nazwa użytkownika lub hasło!"; //Jeśli dane sa nie poprawne to wypsiuje taka wiadomosc
				}else
				{
					echo "Zła nazwa użytkownika lub hasło!"; //Jeśli dane sa nie poprawne to wypsiuje taka wiadomosc
				}
			}
		?>
	</div>
</section>
<?php
    include_once './includes\footer.php';
?>