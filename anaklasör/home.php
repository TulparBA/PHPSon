<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    $sql = "SELECT * FROM users WHERE id = " . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No data found.";
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
    <title>Ana Sayfa</title>
    <link rel = "icon" href = "img/moto.png" type = "image/x-icon">
    <h1>Hello, <?php echo $_SESSION['user_name']; ?> </h1>
</head>
<body>
    <div class="arka">
        <img src="img/pp.png" alt="pp" class="img"><br>
        <p>Ad: <?php echo $row['first_name']; ?></p>
        <p>Soyad: <?php echo $row['sur_name']; ?></p>
        <p>Fakülte: <?php echo $row['faculty']; ?></p>
        <p>Telefon: <?php echo $row['telephone']; ?></p>
        <p>Bölüm: <?php echo $row['section']; ?></p>
        <p>Sınıf: <?php echo $row['class']; ?></p>
        <p>Email: <?php echo $row['mail']; ?></p>
        <button class="exit" onclick="location.href='index.php'">Çıkış</button>
        <button class="list" onclick="location.href='liste.php'">Listele</button>
    </div>
</body>
</html>
