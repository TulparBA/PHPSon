<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Silme işlemini gerçekleştir
        $sql = "DELETE FROM bilgisayarlar WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            mysqli_close($conn);
            header("Location: home.php"); // Silme işlemi tamamlandığında liste.php'ye yönlendir
            exit();
        } else {
            echo "Bilgisayar silinirken bir hata oluştu.";
        }
    } else {
        echo "Bilgisayar ID bilgisi eksik.";
    }
} else {
    header("Location: home.php");
    exit();
}
?>
