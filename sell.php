<?php 
session_start();

    include("./db/functions.php");
    include("./db/connect.php");
    include_once './includes\navbar.php';

	$user_data = check_login($mysqli);  //Sprawdza czy jest się zalogowanym

?>
    <div class="content">
        <form action="sell.php" method="post">
            <input type="text" name="marka" placeholder="Marka" required>
            <input type="text" name="model" placeholder="Model" required>
            <input type="number" name="cena" placeholder="Cena" min=0 required>
            <input type="number" name="rocznik" placeholder="Rocznik" min=0 required>
            <input type="url" placeholder="Link do zdjecia" name="zdjecieLink" required>
            <button type="submit">Dodaj</button>
        </form>
    </div>
<?php
    include_once './includes\footer.php';
?>
<?php
    require_once './db/connect.php'; //Wymaga przyjecia podlaczenia bazy danych
    if(isset($_POST['marka'])){
        $marka = ($_POST['marka']); //Pobiera z formatki rzeczy
        $model = ($_POST['model']);
        $cena = ($_POST['cena']);
        $rocznik = strtolower($_POST['rocznik']);
        $zdjecie = $_POST['zdjecieLink'];

        $query = "SELECT * FROM cars WHERE marka='".$marka."'"; //Szuka po marce
        $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
        $total = $results->num_rows;
        if($total>0){
        } else {
            $query = "INSERT INTO cars VALUES(NULL, '".$marka."', '".$model."', '".$cena."', '".$rocznik."', '".$zdjecie."')"; //Wrzuca nam te dane ktora zostały dodane do bazdy danych
            $insert_row = $mysqli->query($query) or die ($mysqli->error.__LINE__);
        }
    }
?>