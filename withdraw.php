
<?php
     $conn = mysqli_connect("localhost","root","","userbank");
    if(!$conn){
      die("Connection failed" . mysqli_connect_error());
    }

      //$userID = $_SESSION['userID'];
if(isset($_POST['SubmitButton'])){
      $userID = $_POST['userID'];

    $account = $_POST['accountNumber'];
    //$pin = $_GET['pin'];
    $balance = $_POST['amount'];

    //finds the balance from the database
    $balanceQuery = "SELECT balance FROM accounts WHERE userID='$userID' AND acctNum = '$account'";

    $result = $conn->query($balanceQuery);
    $row = $result->fetch_assoc();

    $currentBalance = $row["balance"];

    echo ("Starting balance is $" .$currentBalance);

    $finalBalance = $currentBalance - $balance;
     echo ("<p>Final balance is $" .$finalBalance);

     $sql = "UPDATE accounts SET balance = $finalBalance WHERE userID='$userID' AND acctNum = '$account'" ;
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "The data has been added correctly";
    }
    else{
        echo mysqli_error($conn);
        echo "THERE IS AN ERROR";
    }
    mysqli_close($conn);
}

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
      			<a href="userpage2.php" style="float: left;"> Return</a>
      				</div>
      			</div>

          <div class = "rightcolumn">
                <div class= "account">
                       <h2> Navigation </h2>
                       <a href="userpage2.php" style="float: left;"> Home</a>
                       <a href= "" style= "float: left;"> Account Settings</a>
                       <a href= "" style= "float: left;"> </a>
                </div>
          </div>

            <div class = "leftcolumn">
                  <div class = "column">
                        <h1> Deposit to Account</h1>
                        <form action="" method="post">
                        <p>User #: <input type="text" name = "userID"> </p>
                        <p>Account #: <input type="text" name = "accountNumber"> </p>
                        <p>Amount to withdraw($): <input type="text" name = "amount"> </p>
                        <input type="submit" name = "SubmitButton">
                      </form>

                        <?php echo $message; ?>
                       </div>
                  </div>

  </body>
</html>

<!-- <html>
<body>
<form action="" method="post">
      <p>User #: <input type="text" name = "userID"> </p>
    <p>Account #: <input type="text" name = "accountNumber"> </p>
    <p>Amount to withdraw($): <input type="text" name = "amount"> </p>
    <input type="submit" name = "SubmitButton">
    </form>
</form>
</body>
</html> -->
