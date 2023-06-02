<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="webStyle.css">
    </head>
    <body>
        <form action="login.php" method="post">
            <h2>Login</h2>
            <?php
                if(isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>    
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Giriş</button>
        </form>
        <button class="kayit" onclick="location.href='yeni_kullanici.php'">Kayıt Ol</button>
    </body>
</html>
