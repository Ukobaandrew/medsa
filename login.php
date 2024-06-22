<?php
include('config.php');
include('encryption.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password, role FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        
        if ($user['role'] == 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: dashboard.php');
        }
    } else {
        echo "Invalid username or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="signin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <form method="post" action="login.php">
        <h2> Login To Your Account</h2>
        <br><br>
        <input type="text" name="username" placeholder="Username">
        <br><br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <div class="check">
            <input type="checkbox" name="" id="">
            <br>
            <br>
            <p>Remember Me </p>
        </div>
        <br>
        <div class="sign"><button type="submit">SIGN IN</button></div>
        <br>
        <div class="line">
            <div class="line1"></div>
            <p> or </p>
            <div class="line1"></div>
        </div>
        
        <br>
        <div class="dot"><button><a href="#"> <i class='bx bxl-google'></i>  Sign in with Google</a></div></button>
        <br>
        <p>Dont have an account? <a href="register.php">Sign up</a></p>

    </form>
    
</body>
</html>
