<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Veritabanından ilgili bilgisayarın verilerini al
        $sqlll = "SELECT * FROM yazicilar WHERE id = $id";
        $result = mysqli_query($conn, $sqlll);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Yazıcı Bulunamadı.";
            exit();
        }
    } else {
        echo "Geçersiz Yazıcı Demirbaş.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Güncelleme formu gönderildiğinde

        // Yeni özellik değerlerini al
        $marka = $_POST['marka'];
        $model = $_POST['model'];
        $renkli = $_POST['renkli'];

        // Veritabanında güncelleme işlemini gerçekleştir
        $updateSql = "UPDATE yazicilar SET marka = '$marka', model = '$model', renkli = '$renkli' WHERE id = $id";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            echo "Yazıcı Başarıyla Güncellendi.";
        } else {
            echo "Güncelleme Başarısız. Error: " . mysqli_error($conn);
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
    <title>Güncelle</title>
</head>
<body>
    <form method="POST">
        <label for="marka">Marka:</label>
        <input type="text" id="marka" name="marka" value="<?php echo $row['marka']; ?>"><br>
        
        <label for="islemci">Model:</label>
        <input type="text" id="model" name="model" value="<?php echo $row['model']; ?>"><br>
        
        <label for="renkli">Renkli/Renksiz:</label>
        <input type="text" id="renkli" name="renkli" value="<?php echo $row['renkli']; ?>"><br>

        <button type="submit">Güncelle</button>
        
    </form>
    <button onclick="location.href='liste.php'">Listeye Geri Dön</button>
</body>
</html>
