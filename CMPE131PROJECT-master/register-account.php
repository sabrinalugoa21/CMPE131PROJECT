<html>
  <head>
    <title>Processing</title>
  </head>

  <body>
    <h1> Processing </h1>

<?php
  if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["username"])
      && isset($_POST["password"]) && isset($_POST["email"])){
    if ($_POST["fname"] && $_POST["lname"] && $_POST["username"] && $_POST["password"]
        && $_POST["email"]){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    //Create connection
    $conn = mysqli_connect("localhost", "root", "", "userbank");

    //Check connection
    if(!$conn){
        die("Connection failed" . mysqli_connect_error());
    }

    //Register user
    $sql = "INSERT INTO bankaccount (fname, lname, username, password, email) VALUES
            ('$fname','$lname','$username','$password','$email')";

    // echo $sql;
    $results = mysqli_query($conn, $sql);

    if ($results) {
        echo "Registered.";
    } else {
        echo mysqli_error($conn);
      }

      mysqli_close($conn); // close connection

    } else {
      echo "A field is empty.";
    }
    } else {
      echo "Form was not submitted.";
    }
    ?>
  </body>
</html>
