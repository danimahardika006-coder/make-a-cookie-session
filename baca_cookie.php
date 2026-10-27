<?php
    if(isset($_COOKIE["username"])){
        echo "Selamat datang " .htmlspecialchars($_COOKIE["username"]);
    }else {
        echo "Cookie belum tersedia!";
    }

?>

<br>
<a href="hapus_cookie.php"> Hapus Cookie </a>