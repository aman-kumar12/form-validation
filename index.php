<?php
if (isset($_POST['name'])) {
    error_reporting(0);
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn) {
        die('connection erron' . mysqli_connect_error());
    } else {
        // echo '<h1>Connected successfully</h1>';
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $village = $_POST['village'];
    $email = $_POST['email'];
    $num = $_POST['num'];

    $sql = "INSERT INTO `form`.`cricket` (`name`, `age`, `village`, `email`, `number`, `date`) VALUES ('$name', '$age', '$village', '$email ', '$num', current_timestamp());";

    // echo $sql;

    if ($conn->query($sql) == true) {
        // echo 'successfully inserted';
    } else {
        echo "ERROR: $sql <br> $conn->error";
    }
    $conn->close();

    $name = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $type = $_FILES['image']['type'];
    $size = $_FILES['image']['size'];

    $path = 'images/' . $name;

    move_uploaded_file($tmpname, $path);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Adarsh-Cricket-Club-Jamuawan</title>
</head>

<body>
    <div class="logo">
        <h1>ACCJ</h1>
    </div>
    <div class="center">
        <h2>Adarsh Cricket Club <br> Jamuawan</h2>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div class="form">
                Name: <input type="text" class="name" id="name" name="name" placeholder="Enter your name">
                Age: <input type="number" class="age" id="
                age" name="age" placeholder="Enter your age">
            </div>
            <div class="gender">Gender:
                Male: <input type="radio" name="gender" id="gender">
                Female: <input type="radio" name="gender" id="gender">
                Other: <input type="radio" name="gender" id="gender">
            </div>
            <div class="form">
                Village: <input type="text" class="village" id="village" name="village" placeholder="Enter your village name">
                Email: <input type="email" class="email" id="
                email" name="email" placeholder="Enter your email">
            </div>
            <div class="numf">
                Number: <input type="number" class="num" name="num" id="num" placeholder="Enter your number">
                Image: <input type="file" name="image" id="image">
            </div>
            <div class="btn">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>

        </form>
    </div>
</body>

</html>