<?php 
session_start();

	include("./db/functions.php");
	include("./db/connect.php");
	include_once './includes\navbar.php';

	$user_data = check_login($mysqli); //Sprawdza czy jest się zalogowanym

   
    if(isset($_POST['submit']) && !empty($_POST['szukanie']) && isset($_POST['szukanie'])){
        $marka = $_POST['szukanie'];
        $query = "SELECT * FROM cars WHERE marka='$marka'";  //Pobiera nam wszystko z tabeli cars
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows;
        $items = $results->fetch_all();
    } else {
        $query = "SELECT * FROM cars";  //Pobiera nam wszystko z tabeli cars
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows;
        $items = $results->fetch_all();
    }

        if($total>=0):
    ?>
<div class="search">
    <form action="buy.php" method="POST">
        <select name="szukanie" id="szukanie">
            <option value="">Wszystkie Samochody</option>
            <option value="Audi">Audi</option>
            <option value="BMW">BMW</option>
            <option value="Porsche">Porsche</option>
            <option value="Lamborghini">Lamborghini</option>
            <option value="alfa romeo">Alfa</option>
        </select>
        <button type="submit" name="submit" id="submit">Szukaj</button>
    </form>
</div>
<div class="product">
    <?php
        for($i = 0; $i<$total; $i++):
            echo("<div class=\"product-box\">");
            echo("<div class=\"product-img\">");
            echo("<img src=\"".$items[$i][5]."\" alt=\"picture\"/>");
            echo("</div>");
            echo("<div class=\"product-desc\">");
            echo("<h3>".$items[$i][1]." ".$items[$i][2]."</h3>");
            echo("<h4>Cena: ".$items[$i][3]." PLN</h4>");
            echo("<h4>Rocznik: ".$items[$i][4]."r.</h4>");
                if(isset($_SESSION['user_id'])){
                    $query_user = "SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'"; 
                    $results_user = $mysqli->query($query_user) or die($mysqli->error.__LINE__);
                    $total_user = $results_user->num_rows;
                    if($total_user>0){
                        print("<button><a href=\"car.php?id=".$items[$i][0]."\">Kup Samochód</a></button>");
                    }
                }
            echo("</div>");
            echo("</div>");
        endfor; 
    ?>
</div>
<?php
    else:
?>
<div class="product">
    <h1>Brak produktów.</h1>
</div>
<?php
    endif;
?>

<?php
    include_once './includes\footer.php';
?>