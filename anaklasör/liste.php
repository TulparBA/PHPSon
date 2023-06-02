<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    if (isset($_POST['delete_id'])) {
        $id = $_POST['delete_id'];

        // Silme işlemi için veritabanı sorgusu
        $sql = "DELETE FROM bilgisayarlar WHERE id = $id";
        

        if (mysqli_query($conn, $sql)) {
            echo "Bilgisayar başarıyla silindi.";
        } else {
            echo "Bilgisayar silme işlemi başarısız oldu: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['delete_id1'])) {
        $id = $_POST['delete_id1'];

        // Silme işlemi için veritabanı sorgusu
        $sql = "DELETE FROM monitor WHERE id = $id";
        

        if (mysqli_query($conn, $sql)) {
            echo "Monitör başarıyla silindi.";
        } else {
            echo "Monitör silme işlemi başarısız oldu: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['delete_id2'])) {
        $id = $_POST['delete_id2'];

        // Silme işlemi için veritabanı sorgusu
        $sql = "DELETE FROM yazicilar WHERE id = $id";
        

        if (mysqli_query($conn, $sql)) {
            echo "Yazıcı başarıyla silindi.";
        } else {
            echo "Yazıcı silme işlemi başarısız oldu: " . mysqli_error($conn);
        }
    }

    // Bilgisayar verilerini çekme sorgusu
    $sql = "SELECT * FROM bilgisayarlar";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Demir Baş:" . $row['id'] . "<br>";
            echo "Bilgisayar Markası: " . $row['marka'] . "<br>";
            echo "İşlemci: " . $row['islemci'] . "<br>";
            echo "RAM: " . $row['ram'] . "<br>";
            echo "Depolama: " . $row['depolama'] . "<br>";
            echo "-------------------------------<br>";
            echo "<form action='liste.php' method='post'>";
            echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
            echo "<button type='submit'>Sil</button>";
            echo "</form>";
            echo "<form action='bilgisayar_guncelle.php' method='get'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit'>Güncelle</button>";
            echo "</form>";
            echo "<br><br>";
        }
    } else {
        echo "Bilgisayar Yok.";
    }

    $sql = "SELECT * FROM yazicilar";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Demir Baş:" . $row['id'] . "<br>";
            echo "Yazıcı Markası: " . $row['marka'] . "<br>";
            echo "Modeli: " . $row['model'] . "<br>";
            echo "Renkli/Renksiz: " . $row['renkli'] . "<br>";
            echo "-------------------------------<br>";
            echo "<form action='liste.php' method='post'>";
            echo "<input type='hidden' name='delete_id2' value='" . $row['id'] . "'>";
            echo "<button type='submit'>Sil</button>";
            echo "</form>";
            echo "<form action='bilgisayar_guncelle.php' method='get'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit'>Güncelle</button>";
            echo "</form>";
            echo "<br><br>";
        }
    } else {
        echo "Yazıcı Yok. <br>";
    }

    $sql = "SELECT * FROM monitor";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Demir Baş:" . $row['id'] . "<br>";
            echo "Monitör Markası: " . $row['marka'] . "<br>";
            echo "Hertz: " . $row['hertz'] . "<br>";
            echo "Yanıt Süresi1: " . $row['yanit'] . "<br>";
            echo "-------------------------------<br>";
            echo "<form action='liste.php' method='post'>";
            echo "<input type='hidden' name='delete_id1' value='" . $row['id'] . "'>";
            echo "<button type='submit'>Sil</button>";
            echo "</form>";
            echo "<form action='bilgisayar_guncelle.php' method='get'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit'>Güncelle</button>";
            echo "</form>";
            echo "<br><br>";
        }
    } else {
        echo "Monitör Yok. <br>";
    } 

    mysqli_close($conn);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="webStyle.css">
    <title>Bilgisayar Listesi</title>
    <link rel = "icon" href = "img/moto.png" type = "image/x-icon"> 
</head>
<body>
    <button class="list" onclick="location.href='yeni_bilgisayar_ekle.php'">Bilgisayar Ekle</button>
    <button class="list" onclick="location.href='yazici_ekle.php'">Yazıcı Ekle</button>
    <button class="list" onclick="location.href='yeni_monitor.php'">Monitör Ekle</button>
    <button class="anaSayfa" onclick="location.href='home.php'">Ana Sayfaya Dön</button>
</body>
</html>
