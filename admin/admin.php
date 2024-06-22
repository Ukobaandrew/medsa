<?php
include('../config.php');
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
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="admi.css">
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
        
<div class="cont">


<h1>Admin Dashboard</h1>
<table>
    <tr>
        <th>id</th>
        <th>User</th>
        <th>Request</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['request_text']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <form method="post" action="admin.php">
                    <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                    <select name="status">
                        <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                        <option value="approved" <?php if ($row['status'] == 'approved') echo 'selected'; ?>>Approved</option>
                        <option value="rejected" <?php if ($row['status'] == 'rejected') echo 'selected'; ?>>Rejected</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

<a href="logout.php">Logout</a>

</table>


</div>
    </body>
    </html>