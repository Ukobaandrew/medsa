<?php
include('config.php');
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
        echo "<p class='submited'>Request submitted successfully!</p>";
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
    <title>Request</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2 class="meds">Medical Request</h2>
        <form action="" method="post">
            <div class="inputname">
                <div class="inputfirstname">
                    <label for="name" class="name">First Name</label>

                    <input type="text" placeholder="FirstName" name="firstname" id="firstname" required>
                </div>
                <div class="inputlastname">
                    <label for="name" class="name">Last Name</label>
                    <input type="text" placeholder="LastName" name="lastname" id="lastname" required>
                </div>
            </div>
            <div class="mail">
                <div class="inputemailname">
                    <label for="name" class="name">Email</label>
                    <input type="email" placeholder="Email" name="email" id="email" required>
                </div>
                <div class="inputnumber">
                    <label for="name" class="name">Phone Number</label>
                    <input type="tel" name="number" id="num" placeholder="### ### ####" required>
                </div>
            </div>
            <div class="more">
                
                <div class="lad">
                    <label for="medical">Medical Notes</label>
                     <textarea name="request_text" id="Request" required placeholder="Enter your medical request"></textarea>
                </div>
            </div>

            <input type="submit" value="Submit" class="submit">

            <ul>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <li><?php echo $row['request_text']; ?> - <?php echo $row['status']; ?></li>
    <?php } ?>
</ul>
        </form>
    </div>
</body>

</html> 


<!-- 
<h1>Welcome, </h1>
<form method="post" action="request.php">
    <textarea name="request_text" required placeholder="Enter your medical request"></textarea>
    <button type="submit">Submit Request</button>
</form>

<h2>Your Requests</h2>
<ul>
    
</ul>

<a href="logout.php">Logout</a> -->
