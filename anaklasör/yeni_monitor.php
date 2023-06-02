<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    if (isset($_POST['marka']) && isset($_POST['hertz']) && isset($_POST['yanit'])) {
        $marka = $_POST['marka'];
        $hertz = $_POST['hertz'];
        $yanit = $_POST['yanit'];

        $sql = "INSERT INTO monitor (marka, hertz, yanit) VALUES ('$marka', '$hertz', '$yanit')";

        if (mysqli_query($conn, $sql)) {
            echo "Yeni monitör başarıyla eklendi.";
        } else {
            echo "Monitör ekleme işlemi başarısız oldu: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="webStyle.css">
    <link rel = "icon" href = "img/moto.png" type = "image/x-icon">
    <title>Monitör Kayıt</title>
</head>
<body>
    <form action="yeni_monitor.php" method="post">
        <label for="marka">Marka:</label>
        <input type="text" id="marka" name="marka" required><br><br>

        <label for="hertz">Hertz:</label>
        <input type="text" id="hertz" name="hertz" required><br><br>

        <label for="yanit">Yanıt Süresi:</label>
        <input type="text" id="yanit" name="yanit" required><br><br>
        <button class="ekle" onclick="document.querySelector('form').submit()">Ekle</button>
    </form>
    <button onclick="location.href='liste.php'">Listeye Geri Dön</button>
</body>
</html>
