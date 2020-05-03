<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","userbank");
  //echo "connected! <br>"; //commented out so user does not see this
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }
/*ACCOUNT SELECTION MENU*/
    $userID = $_SESSION['userID'];
//$userID =167053; //was using this line for testing (to avoid having to log in)
$message = "";

$form = "SELECT * FROM accounts WHERE userID='$userID'";
$formresult = mysqli_query($conn, $form);
/*ACCOUNT SELECTION MENU END*/

if(isset($_POST['SubmitButton'])){ //check if form was submitted
        $amount = $_POST['amount']; //get input text
        $account = $_POST['account'];


        $sql = "SELECT acctNum, balance FROM accounts WHERE userID='$userID' AND acctName = '$account' ";
        $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);

            $acctNum = $row["acctNum"];
            $balance = $row["balance"];

        $newbalance = $balance + $amount;

        $sql2 = "UPDATE accounts SET balance='$newbalance' WHERE userID='$userID'AND acctName = '$account'" ;

              if ($conn->query($sql2) === TRUE) {
                 //echo "Record updated successfully"; //commented out so user does not see this
             } else {
                 echo "Error updating record: " . $conn->error;
             }

  //$finalbalance = $row["balance"];
  $message = "<p>Success! You deposited $$amount into $account.</p> <p>Your new balance is $newbalance.";
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
                        <h1> Deposit to Account</h1>
                        <form action="" method="post">
                              <p> Account name: <select id="account" name="account">
                              <?php
                                    /*ACCOUNT SELECTION MENU CONT.*/
                                        while($row1 = $formresult->fetch_assoc()):;?>
                                        <option value="<?php echo $row1["acctName"];?>"><?php echo $row1["acctName"];?>  [Balance: $<?php echo $row1["balance"];?>]</option>
                                  <?php endwhile;
                                  /*ACCOUNT SELECTION END*/
                                  ?>
                                </select></p>
                          <p>Amount ($): <input type="text" name = "amount"> </p>
                          <input type="submit" name = "SubmitButton">
                        </form>
                        <?php
                              echo $message;
                          ?>
                       </div>
                  </div>

  </body>
</html>
