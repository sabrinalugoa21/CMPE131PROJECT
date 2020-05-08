<?php
      session_start();

      $conn = mysqli_connect("localhost", "root", "", "userbank"); // check connection

      if (!$conn)
      {
       die("Connection failed: " . mysqli_connect_error());
      }

      $message = "";
      $userID = $_SESSION['userID'];
      //$userID = 101010; //for testing

  if (isset($_POST['submit'])) {
    if($_POST['amount'])
    {
       $account1 = $_POST['account1'];
       $account2 = $_POST['account2'];
       $amount = $_POST['amount'];

       $sql1 = mysqli_query($conn,"SELECT balance, acctNum FROM accounts WHERE userID = '$userID' AND acctName = '$account1'");
       $sql2 = mysqli_query($conn, "SELECT balance, acctNum FROM accounts WHERE userID = '$userID' AND acctName = '$account2'");

       $row1 = mysqli_fetch_assoc($sql1);
       $row2 = mysqli_fetch_assoc($sql2);

       $acctNum1 = $row1["balance"];
       $acctID1 = $row1["acctNum"];

       $acctNum2 = $row2["balance"];
       $acctID2 = $row2["acctNum"];

       if(ctype_alpha($amount) || ctype_punct($amount))
       {
         $message = "<b>ONLY numbers!</b>";
       }
       else if($acctNum1 < $amount)
       {
          $message = "<b>Error: insufficient funds!</b>";
       }
       else if($amount < 0)
       {
         $message = "<b>Only real numbers.</b>";
       }
       else if ($account1 == $account2)
       {
         $message = "<b>Error: Same account selected!</b>";
       }
       else
       {

          $sum1 = $acctNum1 - $amount;
          $sum2 = $acctNum2 + $amount;


           mysqli_query($conn, "UPDATE accounts set balance = '$sum1' WHERE userID = '$userID' AND acctName = '$account1'");
           mysqli_query($conn, "UPDATE accounts set balance = '$sum2' WHERE userID = '$userID' AND acctName = '$account2'");

           $sql3 = "INSERT INTO transactions (transType, userID, acctNum, acctName, amount) VALUES
                    ('Transfer from','$userID','$acctID1','$account1','-$amount')";
           $result3 = mysqli_query($conn,$sql3);

           $sql4 = "INSERT INTO transactions (transType, userID, acctNum, acctName, amount) VALUES
                   ('Transfer to','$userID','$acctID2','$account2','$amount')";
           $result4 = mysqli_query($conn,$sql4); //NOT DISPLAYING ON TRANSACTION HISTORY

            $message = "<p>Success! You transferred $$amount from $account1 to $account2.</p>";
      }
    }
 }
    else
    {
      echo '';
    }
?>
    <html>
      <head> <!This is the title of the webpage>
        <meta charset="utf-8">
        <title>Transfer</title>
        <link rel="stylesheet" href="deposit.css">
      </head>

      <body>  <!This is the title page>
          <div class = "row">
              <div id = "grad1", class = "header"><h1>
               <p class = "custom1"> Corona Credit</p>
             </h1></div>
          		<div class="topnav">
                        <a href="logout.php" style="float: right;"> Sign Out</a>
      			            <a href="test_userpage.php" style="float: left;"> Return to Home</a>
                        <a href= "customAccounts.php" style="float: left;"> View Accounts</a>
                        <a href= "addAccount.php" style="float: left;"> Add Accounts</a>
                        <a href= "deleteAccount.php" style="float: left;"> Delete Accounts</a>
                        <a href= "transfer.php" style="float: left;">Transfer Cash</a>
                        <a href= "deposit-with-image.php" style="float: left;">Deposit Cash</a>
      				</div>
      			</div>

       <div class = "leftcolumn">
             <div class = "column">
            <form action = "" method = post>
            <h1>Transfer Funds</h1>
              <p>Transfer from:
                <select name = "account1">
                  <?php
                    $result1 = mysqli_query($conn, "SELECT acctName, balance from accounts WHERE userID = '$userID'");
                    // $resul2 = mysqli_query($conn, "SELECT acctnum from accounts WHERE userID = '$userID'");

                    while($row1 = $result1->fetch_assoc()):; //&& $row2 = $result2->fetch_assoc()?>
                      <option value="<?php echo $row1["acctName"];?>"><?php echo $row1["acctName"];?>  [Balance: $<?php echo $row1["balance"];?>]</option>
                      <?php endwhile;?>
                    </select></p>

              <p>Transfer to:
                <select name = "account2">
                  <?php
                    $result1 = mysqli_query($conn, "SELECT acctName, balance from accounts WHERE userID = '$userID'");
                    // $resul2 = mysqli_query($conn, "SELECT acctnum from accounts WHERE userID = '$userID'");

                    while($row1 = $result1->fetch_assoc()):; //&& $row2 = $result2->fetch_assoc();?>
                      <option value="<?php echo $row1["acctName"];?>"><?php echo $row1["acctName"];?>  [Balance: $<?php echo $row1["balance"];?>]</option>
                      <?php endwhile;?>

                    </select>
              </p>

              <p>Amount to transfer ($):
              <input type="text" name="amount" id="transferAmnt" required></p>
              <button type = "submit" name = "submit"> Transfer </button>
            </form>
      <p>
            <?php
                  echo $message;
            ?></p>
        </div>
 </div>

  </body>
</html>
