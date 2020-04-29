<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","userbank");
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }
?>

<!Note: show checking account info>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Checking Account</title>
</head>

<!Note: the login will initialize new checking and savings account>
<!This will find the bank account associated with the user ID and named 'checking'>
    <body>
<?php
      echo("User: " .$_SESSION['userID']);

?>

</body>
</html>
