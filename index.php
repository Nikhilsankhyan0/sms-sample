<?php
error_reporting(0);
$insert = false;
if (isset($_POST['name'])) {
//set connection variables
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "trip";

  //connection establish
  $con = mysqli_connect($server, $username, $password, $database);
  if (!$con) {
    die("connection to this database failed due to " . mysqli_connect_error());
  }
  //   echo "Sucess connecting to database";

  // data insert
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $other = $_POST['other'];
  $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";
  //  echo $sql;  

  if ($con->query($sql) == true) {
    // echo "sucessfully inersted";
    $insert = true;
  } else {
    echo "ERROR : $sql <br> $con->error";
  }

  $con->close();
}
?>
  

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="style.css" />
  <title>Welcome to travel Form</title>
</head>

<body>
  <img class="bg" src="bg.jpeg" alt="Swami Vivekananda College" />
  <div class="container">
    <h1>Welcome to Swami Vivekananda Govt College Banglore IT park trip</h1>
    <p>
      Enter your details and submit this form to confirm your particpations in
      the trip
    </p>

    <?php
    if ($insert == true)
      echo "<p class='submitmsg'>
        Thanks for submiting your form . We are happy to see you joining the
        Banglore trip.
        </p>";
    ?>

    <form action="index.php" method="post">
      <input type="text" name="name" id="name" placeholder="Enter your name" />
      <input type="number" name="age" id="age" placeholder="Enter your age" />
      <input type="text" name="gender" id="gender" placeholder="Enter your gender" />

      <input type="email" name="email" id="email" placeholder="Enter your email" />
      <input type="number" name="phone" id="phone" placeholder="Enter your phone" />
      <textarea name="other" id="" cols="30" rows="5" placeholder="Enter any other information here"></textarea>
      <button class="btn">Submit</button>
      <!-- <button class="btn">Reset</button> -->
    </form>
  </div>
  <!-- INSERT INTO `trip` (`SrNo`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'nikhil', '45', 'male', 'this@this.com', '564465465', 'yes im realdy to go to the trip', current_timestamp()); -->
  <script src="index.js"></script>
</body>

</html>