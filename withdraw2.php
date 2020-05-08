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

/*ACCOUNT SELECTION MENU END*/

if(isset($_POST['SubmitButton'])){ //check if form was submitted
        $amount = $_POST['amount']; //get input text
        $account = $_POST['account'];
       $amountValidation = $_POST["amount"];
     if (!preg_match("/^[0-9]*$/",$amountValidation)) {
           $nameErr = "Only letters and white space allowed";
          $message = "<b>Error:</b> Only numbers allowed.";
     }
     else if ($amount <= 0){
            $message = "<b>Error:</b> Please enter a dollar amount greater than zero.";
     }
     else{
        $sql = "SELECT acctNum, balance FROM accounts WHERE userID='$userID' AND acctName = '$account' ";
        $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);

            $acctNum = $row["acctNum"];
            $balance = $row["balance"];
            $newbalance = $balance - $amount;

            if ($newbalance < 0){
                  $message = "<b>Error:</b> Insufficient funds.";
            }
            else {
                  $sql2 = "UPDATE accounts SET balance='$newbalance' WHERE userID='$userID'AND acctName = '$account'" ;

                        if ($conn->query($sql2) === TRUE) {
                           //echo "Record updated successfully"; //commented out so user does not see this
                           $sql3 = "INSERT INTO transactions (transType, userID, acctNum, acctName, amount) VALUES
                                   ('Withdraw','$userID','$acctNum','$account','-$amount')";
                          $result3 = mysqli_query($conn,$sql3);
                       } else {
                           echo "Error updating record: " . $conn->error;
                       }

                    //$finalbalance = $row["balance"];
                    $message = "<p>Success! You withdrew $$amount from $account.</p> <p>Your new balance is $$newbalance.";
              }
        }
 }

?>
<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Withdraw</title>
    <link rel="stylesheet" href="deposit.css">
  </head>

  <body>  <!This is the title page>
      <div class = "row">
          <div id = "grad1", class = "header"><h1>
           <p class = "custom1">Corona Credit</p>
         </h1></div>
          <div id = ""
      		<div class="topnav">
                        <a href="atm.php" style="float: left;">Return to ATM</a>
      			<a href="logout.php" style="float: right;"> Sign Out</a>
      				</div>
      			</div>

            <div class = "leftcolumn">
                  <div class = "column">
                        <h1>Withdraw from Account</h1>
                        <form action="" method="post">
                              <p> Account name: <select id="account" name="account">
                              <?php
                                    /*ACCOUNT SELECTION MENU CONT.*/
                                    $form = "SELECT * FROM accounts WHERE userID='$userID'";
                                    $formresult = mysqli_query($conn, $form);
                                        while($row1 = $formresult->fetch_assoc()):;?>
                                        <option value="<?php echo $row1["acctName"];?>"><?php echo $row1["acctName"];?>  [Balance: $<?php echo $row1["balance"];?>]</option>
                                  <?php endwhile;
                                  /*ACCOUNT SELECTION END*/
                                  ?>
                                </select></p>
                        <p>Amount to withdraw($): <input type="text" name = "amount" required> </p>
                        <button type = "submit" name = "SubmitButton"> Withdraw </button>
                      </form>

                        <?php echo $message; ?>
                       </div>
                  </div>

  </body>
</html>
