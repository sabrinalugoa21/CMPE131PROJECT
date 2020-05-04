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

<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Account Information</title>
    <link rel="stylesheet" href="deposit.css">
  </head>

  <body>  <!This is the title page>
      <div class = "row">
          <div id = "grad1", class = "header"><h1>
           <p class = "custom1"> SJSU BANK</p>
         </h1></div>
          <div id = ""
      		<div class="topnav">
      			<a href="logout.php" style="float: right;"> Sign Out</a>
      			<a href="test_userpage.php" style="float: left;"> Return to Home</a>
                        <a href= "customAccounts.php" style="float: left;"> View Accounts</a>
                        <a href= "addAccount.php" style="float: left;"> Add Accounts</a>
                        <a href= "deleteAccount.php" style="float: left;"> Delete Accounts</a>
      				</div>
      			</div>

          <div class = "rightcolumn">
                <div class= "account">
                       <h2> Navigation </h2>
                       <p><a href="test_userpage.php">Return to Home</a></p>
                       <p>--</p>
                       <p><a href= "transfer.php">Transfer Cash</a></p>
                       <p>--</p>
                       <p><a href= "customAccounts.php"> View Accounts</a></p>
                       <p><a href= "addAccount.php"> Add Accounts</a></p>
                       <p><a href= "deleteAccount.php"> Delete Accounts</a></p>
                </div>
          </div>

            <div class = "leftcolumn">
                  <div class = "column">
                        <body>
              <h1> Account Information</h1>
                  <p><?php echo("<b>Name:</b> " .$_SESSION['fname'] . " " .$_SESSION['lname']); ?></p>
                  <p><?php echo("<b>Username:</b> " .$_SESSION['username']); ?></p>
                  <p><?php echo("<b>User ID Number:</b> " .$_SESSION['userID']); ?></p>
                  <p><?php echo("<b>Email:</b> " .$_SESSION['email']); ?></p>


</body>
                       </div>
                  </div>

  </body>
</html>
