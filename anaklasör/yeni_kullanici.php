<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    if (isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['sur_name']) && isset($_POST['first_name']) && isset($_POST['mail']) && isset($_POST['faculty']) && isset($_POST['telephone']) && isset($_POST['section']) && isset($_POST['class'])) {
        $user_name = $_POST['user_name'];
        $first_name = $_POST['first_name'];
        $sur_name = $_POST['sur_name'];
        $password = $_POST['password'];
        $mail = $_POST['mail'];
        $telephone = $_POST['telephone'];
        $faculty = $_POST['faculty'];
        $section = $_POST['section'];
        $class = $_POST['class'];

        // Veritabanına ekleme sorgusu
        $sql = "INSERT INTO users (user_name, first_name, sur_name, password, mail, telephone, faculty, section, class) VALUES ('$user_name', '$first_name', '$sur_name', '$password' ,'$mail' ,'$telephone' ,'$faculty' ,'$section' ,'$class')";

        if (mysqli_query($conn, $sql)) {
            echo "Yeni kullanıcı başarıyla eklendi.";
        } else {
            echo "Kullanıcı ekleme işlemi başarısız oldu: " . mysqli_error($conn);
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
    <title>Kullanıcı Kayıt</title>
</head>
<body>
    <form action="yeni_kullanici.php" method="post">
        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" name="user_name" required><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="sur_name">Surname:</label>
        <input type="text" id="sur_name" name="sur_name" required><br><br>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required><br><br>
        
        <label for="mail">Mail:</label>
        <input type="text" id="mail" name="mail" required><br><br>

        <label for="telephone">Telephone:</label>
        <input type="text" id="telephone" name="telephone" required><br><br>

        <label for="faculty">Faculty:</label>
        <input type="text" id="faculty" name="faculty" required><br><br>

        <label for="section">Section:</label>
        <input type="text" id="section" name="section" required><br><br>
        
        <label for="class">Class:</label>
        <input type="text" id="class" name="class" required><br><br>
        
    </form>
    <button class="ekle" onclick="document.querySelector('form').submit()">Ekle</button>
</body>
</html>
