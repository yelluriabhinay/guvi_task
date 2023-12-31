<?php
    require 'connect.inc.php';
    function calculateAge($dob) 
    {
        $dob = new DateTime($dob);
        $now = new DateTime();
        $interval = $now->diff($dob);
        return $interval->y;
    }
    if(isset($_GET['email']))
    {
            $email = $_GET['email'];
           
            $sql = "SELECT * FROM users WHERE email ='$email'  ";
            $result = $con->query($sql);
        
            $row = $result->fetch_assoc();
            $dob = $row['date_of_birth'];
            
            $age = calculateAge($dob);
            
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            min-block-size: 100vh;
        }

        .profile-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            inline-size: 300px;
            text-align: center;
        }

        .profile-card img {
            inline-size: 100px;
            block-size: 100px;
            border-radius: 50%;
            margin-block-end: 15px;
        }

        .profile-card h2 {
            color: #333;
        }

        .profile-details {
            text-align: start;
            margin-block-start: 15px;
        }

        .profile-details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="profile-card">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/1200px-User_icon_2.svg.png" alt="Profile Picture">
        <h2>User Profile</h2>
        <div class="profile-details">
            <p><strong>Name:</strong> <?php echo $row['first_name']?> <?php echo $row['last_name']?></p>
            <p><strong>Email:</strong> <?php echo $row['email']?></p>
            <p><strong>Age:</strong> <?php echo  $age ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $row['date_of_birth']?></p>
            <p><strong>Mobile Number:</strong> <?php echo $row['mobile_number']?></p>
            <!-- Add more details as needed -->
        </div>
    </div>

</body>
</html>