<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>DOMSKY KOMIS</title>
</head>
<body>
<header>
        <h1><a href="index.php">Domsky Komis</a></h1>
        <nav>
            <ul>
                <li><a href="buy.php">Zakup</a></li>
                <li><a href="sell.php">Sprzedaż</a></li>
                <?php
                    if(isset($_SESSION['user_id'])):

                ?>
                    <a href="logout.php">Wyloguj się</a>
                <?php
                else:
                ?>
                    <a href="login.php">Zaloguj Się</a>
                <?php
                endif;

                ?>
            </ul>
        </nav>
    </header>
</body>