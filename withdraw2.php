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
    //$userID = $_SESSION['userID'];
$userID =167053; //was using this line for testing (to avoid having to log in)
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

            $newbalance = $balance - $amount;

            $sql2 = "UPDATE accounts SET balance='$newbalance' WHERE userID='$userID'AND acctName = '$account'" ;

                  if ($conn->query($sql2) === TRUE) {
                     //echo "Record updated successfully"; //commented out so user does not see this
                 } else {
                     echo "Error updating record: " . $conn->error;
                 }

        //$finalbalance = $row["balance"];
        $message = "<p>Success! You withdrew $$amount from $account.</p> <p>Your new balance is $$newbalance.";
        }

    mysqli_close($conn);

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
           <p class = "custom1">SJSU Bank</p>
         </h1></div>
          <div id = ""
      		<div class="topnav">
      			<a href="logout.php" style="float: right;"> Sign Out</a>
      				</div>
      			</div>

                        <div class = "rightcolumn">
                             <div class= "account">
                                    <h2> Navigation </h2>
                                    <p><a href="atm.php">Return to ATM</a></p>
                             </div>
                       </div>

            <div class = "leftcolumn">
                  <div class = "column">
                        <h1>Withdraw from Account</h1>
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
                        <p>Amount to withdraw($): <input type="text" name = "amount" required> </p>
                        <input type="submit" name = "SubmitButton">
                      </form>

                        <?php echo $message; ?>
                       </div>
                  </div>

  </body>
</html>
