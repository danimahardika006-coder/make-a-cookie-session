<?php
    session_start();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "Dani" && $password == "12345"){
            session_regenerate_id(true);

            $_SESSION['username'] = $username;

            header("Location: dashboard.php");
            exit;
        } else{
            $ERROR = "Username atau Password anda salah";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>

    <?php if(isset($error)){ ?>
        <p> <?= htmlspecialchars($ERROR) ?> </p>
    <?php }?>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <br><br>

        <label>Password</label>
        <input type="password" name="password" required>

        <br><br>
        
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>n">Login</button>
    </form>
</body>
</html>