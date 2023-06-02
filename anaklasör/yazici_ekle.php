<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    if (isset($_POST['marka']) && isset($_POST['model']) && isset($_POST['renkli'])) {
        $marka = $_POST['marka'];
        $model = $_POST['model'];
        $renkli = $_POST['renkli'];

        $sql = "INSERT INTO yazicilar (marka, model, renkli) VALUES ('$marka', '$model', '$renkli')";

        if (mysqli_query($conn, $sql)) {
            echo "Yeni yazıcı başarıyla eklendi.";
        } else {
            echo "Yazıcı ekleme işlemi başarısız oldu: " . mysqli_error($conn);
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
    <title>Yazıcı Kayıt</title>
</head>
<body>
    <form action="yazici_ekle.php" method="post">
        <label for="marka">Marka:</label>
        <input type="text" id="marka" name="marka" required><br><br>

        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required><br><br>

        <label for="renk">Renkli:</label>
        <input type="text" id="renkli" name="renkli" required><br><br>
        <button class="ekle" onclick="document.querySelector('form').submit()">Ekle</button>
    </form>
    <button onclick="location.href='liste.php'">Listeye Geri Dön</button>
</body>
</html>
