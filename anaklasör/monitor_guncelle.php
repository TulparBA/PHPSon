<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Veritabanından ilgili bilgisayarın verilerini al
        $sql = "SELECT * FROM bilgisayarlar WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Computer not found.";
            exit();
        }
    } else {
        echo "Invalid computer ID.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Güncelleme formu gönderildiğinde

        // Yeni özellik değerlerini al
        $marka = $_POST['marka'];
        $islemci = $_POST['islemci'];
        $ram = $_POST['ram'];
        $depolama = $_POST['depolama'];

        // Veritabanında güncelleme işlemini gerçekleştir
        $updateSql = "UPDATE bilgisayarlar SET marka = '$marka', islemci = '$islemci', ram = '$ram', depolama = '$depolama' WHERE id = $id";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            echo "Computer updated successfully.";
        } else {
            echo "Update failed. Error: " . mysqli_error($conn);
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
        
        <label for="islemci">İşlemci:</label>
        <input type="text" id="islemci" name="islemci" value="<?php echo $row['islemci']; ?>"><br>
        
        <label for="ram">RAM:</label>
        <input type="text" id="ram" name="ram" value="<?php echo $row['ram']; ?>"><br>
        
        <label for="depolama">Depolama:</label>
        <input type="text" id="depolama" name="depolama" value="<?php echo $row['depolama']; ?>"><br>

        <button type="submit">Güncelle</button>
        
    </form>
    <button onclick="location.href='liste.php'">Listeye Geri Dön</button>
</body>
</html>
