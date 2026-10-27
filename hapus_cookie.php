<?php setcookie("username", "", time() - 3600, '/');
    echo "Cookie berhasil dihapus!";
?>

<br>
<a href="cookie.php">Buat Cookie Lagi</a>