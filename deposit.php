<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","userbank");
  echo "connected! <br>";
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }

    $userID = $_SESSION['userID'];

$message = "";

if(isset($_POST['SubmitButton'])){ //check if form was submitted
        $amount = $_POST['amount']; //get input text
        $account = $_POST['account'];


        $sql = "SELECT acctNum, balance FROM accounts WHERE userID='$userID'" ;
        $result = $conn->query($sql);

            $row = $result->fetch_assoc();

            $acctNum = $row["acctNum"];
            $balance = $row["balance"];

        $newbalance = $balance + $amount;

        $sql2 = "UPDATE accounts SET balance='$newbalance' WHERE userID='$userID'AND acctName = '$account'" ;

              if ($conn->query($sql2) === TRUE) {
                 echo "Record updated successfully";
             } else {
                 echo "Error updating record: " . $conn->error;
             }
  //$message = "Success! You deposited $".$amount " into " .$account;
}

  // Close connection
  mysqli_close($conn);
?>

<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Deposit</title>
    <link rel="stylesheet" href="deposit.css">
  </head>

  <body>  <!This is the title page>
      <div class = "row">
          <div id = "grad1", class = "header"><h1>
           <p class = "custom1"> BANK NAME</p>
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
                        <h1> Deposit to Account</h1>
                        <form action="" method="post">
                          <p>Account name: <input type="text" name = "account"> </p>
                          <p>Amount ($): <input type="text" name = "amount"> </p>
                          <input type="submit" name = "SubmitButton">
                        </form>
                        <?php echo $message; ?>
                       </div>
                  </div>

  </body>
</html>
