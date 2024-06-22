<?php
include('config.php');
include('encryption.php');
session_start();

if (!isset($_SESSION['userid']) || $_SESSION['role'] != 'user') {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['userid'];
$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_text = $_POST['request_text'];

    $sql = "INSERT INTO requests (user_id, request_text) VALUES ('$user_id', '$request_text')";
    if ($conn->query($sql) === TRUE) {
        echo "Request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM requests WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="evo-calendar.min.css">
    <link rel="stylesheet" href="evo-calendar.midnight-blue.min.css">
</head>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<body>
    <section id="sidebar">
        <div class="nav">
            <div class="logo">
                <a href="#" class="brand"><i class='bx bx-user'></i><?php echo $username; ?>!</a>
            </div>
    
            <ul class="side-menu">
                <li><a href="dashboard.php" class="active"><i class='bx bxl-stack-overflow' ></i>overview</a></li>
                <li><a href="calendar.html"><i class='bx bx-calendar'></i>Calendar</a></li>
                <li><a href="message.php"><i class='bx bxs-chat' ></i>Message</a></li>
                <li><a href="reports.html"><i class='bx bxs-report' ></i>Reports</a></li>
                <li><a href="user.html"><i class='bx bxs-cog' ></i>Settings</a></li>
                <li><a href="logout.php"><i class='bx bx-log-out' ></i>Logout</a> </li>
            </ul>
        </div>
        
        <div class="help">
            <div class="helppics">
                <img src="profile.png" alt="">
            </div>
            
            <h5>Help Center</h5>
            <br>
            <p><a href="">Having trouble?</a> </p>
        </div>
    </section>
    <section id="content">
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon' ></i>
                </div>

                <div class="nav-right">
                    <a href="#" class="nav-link">
                        <i class='bx bxs-bell'></i>
                        <span class="badge">5</span>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bx bxs-message-square-dots"></i>
                        <span class="badge">8</span>
                    </a>
                </div>
            </form>
        </nav>


<form method="post" action="dashboard.php">
    <textarea name="request_text" required placeholder="Enter your medical request"></textarea>
    <button type="submit">Submit Request</button>
</form>

<h2>Your Requests</h2>
<ul>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <li><?php echo $row['request_text']; ?> - <?php echo $row['status']; ?></li>
    <?php } ?>
</ul>

<a href="logout.php">Logout</a>
    
</body>
</html>


