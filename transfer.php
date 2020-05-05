<?php
      session_start();

      $conn = mysqli_connect("localhost", "root", "", "user"); // check connection

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

       $sql1 = mysqli_query($conn,"SELECT balance FROM bankaccounts WHERE userID = '$userID' AND acctname = '$account1'");
       $sql2 = mysqli_query($conn, "SELECT balance FROM bankaccounts WHERE userID = '$userID' AND acctname = '$account2'");

       $row1 = mysqli_fetch_assoc($sql1);
       $row2 = mysqli_fetch_assoc($sql2);

       $acctNum1 = $row1["balance"];
       $acctNum2 = $row2["balance"];


       if($acctNum1 < $amount)
       {
          $message = "<b>Error: insufficient funds!</b>";
       }
       else if ($account1 == $account2)
       {
         $message = "<b>Error: Same account selected!</b>";
       }
       else
       {

          $sum1 = $acctNum1 - $amount;
          $sum2 = $acctNum2 + $amount;


           mysqli_query($conn, "UPDATE bankaccounts set balance = '$sum1' WHERE userID = '$userID' AND acctname = '$account1'");
           mysqli_query($conn, "UPDATE bankaccounts set balance = '$sum2' WHERE userID = '$userID' AND acctname = '$account2'");


            $message = "<p>Success! You transferred $$amount from $account1 to $account2.</p>";
            }
      }
 }
    else
    {
      echo '<p style = "text-align: center;">Transfer amount was not entered. </p>';      //note, triggering the second we open the page?
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
                           <p><a href= "deposit.php">Deposit Cash</a></p>
                           <p>--</p>
                           <p><a href= "customAccounts.php"> View Accounts</a></p>
                           <p><a href= "addAccount.php"> Add Accounts</a></p>
                           <p><a href= "deleteAccount.php"> Delete Accounts</a></p>
                    </div>
              </div>

       <div class = "leftcolumn">
             <div class = "column">
            <form action = "" method = post>
            <h1>Transfer Funds</h1>
              <p>Transfer from:
                <select name = "account1">
                  <?php
                    $result1 = mysqli_query($conn, "SELECT acctname, balance from bankaccounts WHERE userID = '$userID'");
                    // $resul2 = mysqli_query($conn, "SELECT acctnum from bankaccounts WHERE userID = '$userID'");

                    while($row1 = $result1->fetch_assoc()):; //&& $row2 = $result2->fetch_assoc()?>
                      <option value="<?php echo $row1["acctname"];?>"><?php echo $row1["acctname"];?>  [Balance: $<?php echo $row1["balance"];?>]</option>
                      <?php endwhile;?>
                    </select></p>

              <p>Transfer to:
                <select name = "account2">
                  <?php
                    $result1 = mysqli_query($conn, "SELECT acctname, balance from bankaccounts WHERE userID = '$userID'");
                    // $resul2 = mysqli_query($conn, "SELECT acctnum from bankaccounts WHERE userID = '$userID'");

                    while($row1 = $result1->fetch_assoc()):; //&& $row2 = $result2->fetch_assoc();?>
                      <option value="<?php echo $row1["acctname"];?>"><?php echo $row1["acctname"];?>  [Balance: $<?php echo $row1["balance"];?>]</option>
                      <?php endwhile;?>

                    </select>
              </p>

              <p>Amount to transfer ($):
              <input type="text" name="amount" id="transferAmnt" ></p>
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
