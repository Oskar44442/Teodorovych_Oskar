<?php
if (isset($_POST['lang'])) {
    $lang = $_POST['lang'];

    setcookie("language", $lang, time() + (7 * 24 * 60 * 60));

    $_COOKIE['language'] = $lang;
}

$lang = "uk";

if (isset($_COOKIE['language'])) {
    $lang = $_COOKIE['language'];
}

$locales = [
    "uk" => "uk_UA.UTF-8",
    "en" => "en_US.UTF-8",
    "de" => "de_DE.UTF-8",
    "fr" => "fr_FR.UTF-8"
];

setlocale(LC_TIME, $locales[$lang]);

$date = new DateTime();

$currentDate = strftime("%A, %d %B %Y");
$currentTime = $date->format("H:i:s");

$ip = $_SERVER['REMOTE_ADDR'];
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Локалізована дата і час</title>

    <style>
        body {
            font-family: Arial;
            margin: 40px;
            background: #f2f2f2;
        }

        .box {
            background: white;
            padding: 20px;
            width: 400px;
            border-radius: 10px;
        }

        select, button {
            padding: 8px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Вибір мови</h2>

    <form method="POST">
        <select name="lang">
            <option value="uk">Українська</option>
            <option value="en">English</option>
            <option value="de">Deutsch</option>
            <option value="fr">Français</option>
        </select>

        <button type="submit">Зберегти</button>
    </form>

    <hr>

    <h3>Дата:</h3>
    <p><?php echo $currentDate; ?></p>

    <h3>Час:</h3>
    <p><?php echo $currentTime; ?></p>

    <h3>IP користувача:</h3>
    <p><?php echo $ip; ?></p>
</div>

</body>
</html>
// https://oskar.42web.io/Roma.php 