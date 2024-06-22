<?php
include('../config.php');
include('../encryption.php');
session_start();

if (!isset($_SESSION['userid']) || $_SESSION['role'] != 'admin') {
    header('Location: admin_login.php');
    exit();
}

$sql = "SELECT requests.id, users.username, requests.request_text, requests.status FROM requests JOIN users ON requests.user_id = users.id";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];

    $sql = "UPDATE requests SET status = '$status' WHERE id = '$request_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Request status updated!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="sidebar">

        <div class="logo">
            <img src="" alt="ccc">
        </div>
        <br>
        <hr>
        <br>
        <div class="profile">
            <img src="" alt="">
            <p>Super Admin</p>

        </div>
        <br>
        <hr>
        <ul>
            <li><a href="dashboard.php" class="hover"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="" class="hover"><i class='bx bx-laptop'></i>Device</a></li>
            <li><a href="doctorinfo.html" class="hover"><i class='bx bx-plus-medical'></i>Doctor</a></li>
            <li><a href="addpatient.html" class="hover"><i class='bx bxs-user'></i>Patient</a></li>
            <li><a href="" class="hover"><i class='bx bxs-calendar'></i>Doctor Schedule</a></li>
            <li><a href="patappinfo.html" class="hover"><i class='bx bx-calendar-check'></i>Patient Appointment</a></li>
            <li><a href="admin.php" class="hover"><i class='bx bxs-paste'></i>Patient case studies</a></li>
            <li><a href="" class="hover"><i class='bx bxs-capsule'></i>Prescription</a></li>
        </ul>
        <div class="logout">
            <a href="#"><i class='bx bx-exit'></i>Logout</a>
        </div>

    </div>
    <div class="content">
        <div class="topnavbar">
            <div class="gotoweb">
                <ul>
            <li><a href=""><i class='bx bx-globe'></i>Go to website</a></li>
        </ul>
        </div>
            <div class="nav2">
                <ul>
                    <li><a href=""><i class='bx bx-conversation'></i>Chat with us</a></li>
                    <li><a href=""><i class='bx bx-health'></i>HealthEase</a></li>
                    <li><a href=""><i class='bx bxs-user-circle'></i>Mr Patient</a></li>
                </ul>
            </div>

        </div>
        <div class="dashboard">
            <h1>Dashboard</h1>
        </div>
        <div class="eightyy">

            <a href=""><div class="eight">
                 <div class="text">
                     <p>Department <br>8</p>
                 </div>
                <div class="icons blue">
                    <i class='bx bx-building' ></i>
                </div>

        </div>
    </a>
            <a href=""><div class="eight"> 
                <div class="text">
                    <p>Doctor <br>14</p>
                </div>
                <div class="icons green">
                    <i class='bx bx-plus-medical'></i>
                </div>
            </div>
        </a>
            <a href=""><div class="eight">
                <div class="text">
                    <p>Patient <br>1</p>
                </div>
                <div class="icons blue">
                    <i class='bx bxs-user' ></i>
                </div>

            </div>
        </a>
            <a href=""><div class="eight">
                <div class="text">
                    <p>Patient Appointment <br>3</p>
                </div>
                <div class="icons yellow">
                    <i class='bx bxs-calendar-plus' ></i>
                </div>

            </div>
        </a>
            <a href=""><div class="eight">
                <div class="text">
                    <p>Patient Case Study <br>0</p>
                </div>
                <div class="icons yellow" >
                    <i class='bx bxs-file-find' ></i>
                </div>

            </div>
        </a>
            <a href=""><div class="eight">
                <div class="text">
                    <p>Invoice <br>0</p>
                </div>
                <div class="icons blue"> 
                    <i class='bx bxs-box' ></i>
                </div>

            </div>
        </a>
            <a href=""><div class="eight">
                <div class="text">
                    <p>Prescription <br>0</p>
                </div>
                <div class="icons green">
                    <i class='bx bxs-capsule' ></i>
                </div>

            </div>
        </a>
            <a href=""><div class="eight">
                <div class="text">
                    <p>Payment <br>0</p>
                </div>
                <div class="icons blue">
                    <i class='bx bxs-credit-card-alt' ></i>
                </div>

            </div>
        </a>

        </div>
        
    
        <div class="monthly">
            <div class="monthlyreg">
                <p>Monthly Registered Users</p>
            </div>
        </div>
        <div class="earning">
            <div class="monthlyearn">
                <p>Monthly earning</p>
            </div>
        </div>


</body>

</html>