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

<!-- <!Note: show checking account info>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Savings Account</title>hi
</head>

<!Note: the login will initialize new checking and savings account>
<!This will find the bank account associated with the user ID and named 'checking'>
    <body>
          <h1> Savings Account</h1>

                  <p><?php echo("User Number: " .$_SESSION['userID']); ?></p>
                  <p><?php echo("Account number: ".$acctNum); ?></p>
                  <p><?php echo("Current balance: $".$balance); ?></p>

</body>
</html> -->


<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Deposit</title>
    <link rel="stylesheet" href="deposit.css">
  </head>

  <body>  <!This is the title page>
      <div class = "row">
          <div id = "grad1", class = "header"><h1>
           <p class = "custom1"> SJSU Bank</p>
         </h1></div>
          <div id = ""
      		<div class="topnav">
      			<a href="" style="float: right;"> Sign Out</a>
      			<a href="test_userpage.php" style="float: left;"> Return</a>
      				</div>
      			</div>

          <div class = "rightcolumn">
                <div class= "account">
                       <h2> Navigation </h2>
                       <a href="test_userpage.php" style="float: left;"> Home</a>
                       <a href= "test_userpage.php" style= "float: left;"> Account Settings</a>
                       <a href= "test_userpage.php" style= "float: left;"> </a>
                </div>
          </div>

            <div class = "leftcolumn">
                  <div class = "column">
                        <body>
              <h1> Savings Account</h1>

                  <p><?php echo("User Number: " .$_SESSION['userID']); ?></p>
                  <p><?php echo("Account number: ".$acctNum); ?></p>
                  <p><?php echo("Current balance: $".$balance); ?></p>

</body>
                       </div>
                  </div>

  </body>
</html>
