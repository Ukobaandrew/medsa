
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
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient page</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="evo-calendar.min.css">
    <link rel="stylesheet" href="evo-calendar.midnight-blue.min.css">
</head>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<body>
    <div class="container">
        <section id="sidebar">
            <div class="nav">
                <div class="logo">
                    <a href="#" class="brand">Health Care</a>
                </div>
        
                <ul class="side-menu">      
                    <li><a href="dashboard.php" class="active"><i class='bx bxl-stack-overflow' ></i>overview</a></li>
                    <li><a href="calendar.html"><i class='bx bx-calendar'></i>Calendar</a></li>
                    <li><a href="request.php"><i class='bx bxs-chat' ></i>Message</a></li>
                    <li><a href="reports.html"><i class='bx bxs-report' ></i>Reports</a></li>
                    <li><a href="user.html"><i class='bx bxs-user' ></i>User</a></li>
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
                <i class='bx bx-menu toggle-sidebar' id="menu"></i>
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

        <div class="content">
            <div class="top">
                <section class="greetings">
                    <h2 class="Patient">Good Morning Umair</h2>
                    <p class="checking">How are you feeling today?</p>
                </section>
               
            </div>
            <div class="main-content">
                <div class="content1">
                    <div class="intro">
                        <div class="reference">
                            <div class="card1">
                                <div class="head1">
                                    <div>
                                        <h2>Find the best doctors with<br> Health Care</h2>
                                        <p>Appoint the doctors and get finest medical services</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./doctor.webp" alt="" srcset="" class="dock">


                    </div>
                    <div class="info">
                        <h3 class="vitals">Vitals</h3>
                        <div class="info-data">
                            <div class="card">
                                <div class="head">
                                    <div>
                                        <h4>Body Temperature</h4>
                                        <p>36.2 <span>*c</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="head">
                                    <div>
                                        <h4>pulse</h4>
                                        <p>85 <span>bpm</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="head">
                                    <div>
                                        <h4>Blood Pressure</h4>
                                        <p>80/70 <span>mm/kg</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="head">
                                    <div>
                                        <h4>Breathing Rate</h4>
                                        <p>15 <span>breaths/m</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="appointment-info">
                        <h3 class="Appointments">Appointments</h3>
                        <table class="content-table">

                            <thead>
                                <tr>
                                    <th>Doctor</th>
                                    <th>Specification</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>

                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td class="sum"><img src="./medium-shot-nurse-posing-with-stethoscope (1).jpg"
                                            alt="" srcset="" class="img">James Carter</td>
                                    <td>Cardiologist</td>
                                    <td>21/1/23</td>
                                    <td>45:00</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="sum"><img src="./doctor1.jpeg" alt="" srcset="" class="img">James Carter
                                    </td>
                                    <td>Cardiologist</td>
                                    <td>21/1/23</td>
                                    <td>45:00</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="sum"><img src="./doctor2.jpeg" alt="" srcset="" class="img">James Carter
                                    </td>
                                    <td>Cardiologist</td>
                                    <td>21/1/23</td>
                                    <td>45:00</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="sum"><img src="./profile.png" alt="" srcset="" class="img">James Carter
                                    </td>
                                    <td>Cardiologist</td>
                                    <td>21/1/23</td>
                                    <td>45:00</td>
                                    <td>Active</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="content2">
                    <section class="reports">
                        <table class="content-table">

                            <thead>
                                <tr>
                                    <th>My Reports</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><a href="" class="active"><i class='bx bxl-stack-overflow'></i>Glucose</a></td>
                                    <td>02/1/2023</td>
                                </tr>
                                <tr>
                                    <td><a href="" class="active"><i class='bx bxl-stack-overflow'></i>Glucose</a></td>
                                    <td>02/1/2023</td>
                                </tr>
                                <tr>
                                    <td><a href="" class="active"><i class='bx bxl-stack-overflow'></i>Glucose</a></td>
                                    <td>02/1/2023</td>
                                </tr>
                                <tr>
                                    <td><a href="" class="active"><i class='bx bxl-stack-overflow'></i>Glucose</a></td>
                                    <td>02/1/2023</td>
                                </tr>
                                <tr>
                                    <td><a href="" class="active"><i class='bx bxl-stack-overflow'></i>Glucose</a></td>
                                    <td>02/1/2023</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                    <section class="calendar">
                        <div class="hero">
                            <div id="calendar"></div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
                        <script src="evo-calendar.min.js"></script>


                        <script>

                            $(document).ready(function () {
                                $('#calendar').evoCalendar({


                                    calendarEvents: [
                                        {
                                            id: 'event', // Event's ID (required)
                                            name: "New Year", // Event name (required)
                                            date: "January/1/2020", // Event date (required)
                                            description: "today is the best dya evwr",
                                            type: "holiday", // Event type (required)
                                            everyYear: true // Same event every year (optional)
                                        },
                                        {
                                            name: "Vacation Leave",
                                            badge: "02/13 - 02/15", // Event badge (optional)
                                            date: ["February/13/2020", "February/15/2020"], // Date range
                                            description: "Vacation leave for 3 days.", // Event description (optional)
                                            type: "event",
                                            color: "#63d867" // Event custom color (optional)
                                        }
                                    ]
                                })
                            })
                        </script>
                    </section>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

