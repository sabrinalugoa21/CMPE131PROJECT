<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","userbank");
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }

  $userID = $_SESSION['userID'];

  $sql = "SELECT acctNum, balance FROM accounts WHERE userID='$userID'";
  $result = $conn->query($sql);

      $row = $result->fetch_assoc();

      $acctNum = $row["acctNum"];
      $balance = $row["balance"];

  $conn->close();
?>

<!Note: show checking account info>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Savings Account</title>
</head>

<!Note: the login will initialize new checking and savings account>
<!This will find the bank account associated with the user ID and named 'checking'>
    <body>
          <h1> Savings Account</h1>

                  <p><?php echo("User Number: " .$_SESSION['userID']); ?></p>
                  <p><?php echo("Account number: ".$acctNum); ?></p>
                  <p><?php echo("Current balance: $".$balance); ?></p>

</body>
</html>
