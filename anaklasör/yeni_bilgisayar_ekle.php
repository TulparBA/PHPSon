<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    if (isset($_POST['marka']) && isset($_POST['islemci']) && isset($_POST['ram']) && isset($_POST['depolama'])) {
        $marka = $_POST['marka'];
        $islemci = $_POST['islemci'];
        $ram = $_POST['ram'];
        $depolama = $_POST['depolama'];

        // Veritabanına ekleme sorgusu
        $sql = "INSERT INTO bilgisayarlar (marka, islemci, ram, depolama) VALUES ('$marka', '$islemci', '$ram', '$depolama')";

        if (mysqli_query($conn, $sql)) {
            echo "Yeni bilgisayar başarıyla eklendi.";
        } else {
            echo "Bilgisayar ekleme işlemi başarısız oldu: " . mysqli_error($conn);
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
    <title>Bilgisayar Kayıt</title>
</head>
<body>
    <form action="yeni_bilgisayar_ekle.php" method="post">
        <label for="marka">Marka:</label>
        <input type="text" id="marka" name="marka" required><br><br>

        <label for="islemci">İşlemci:</label>
        <input type="text" id="islemci" name="islemci" required><br><br>

        <label for="ram">RAM:</label>
        <input type="text" id="ram" name="ram" required><br><br>

        <label for="depolama">Depolama:</label>
        <input type="text" id="depolama" name="depolama" required><br><br>
    </form>
    <button class="ekle" onclick="document.querySelector('form').submit()">Ekle</button>
    <button onclick="location.href='liste.php'">Listeye Geri Dön</button>
</body>
</html>
