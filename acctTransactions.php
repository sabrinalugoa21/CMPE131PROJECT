<! To display all user accounts>
<?php
  session_start();

   $conn = mysqli_connect("localhost","root","","userbank");
   //check connection
   if(!$conn){
       die("Connection failed" . mysqli_connect_error());
   }

   $userID = $_SESSION['userID'];
   $table = "SELECT * FROM transactions WHERE userID='$userID'";
   $tableresult = mysqli_query($conn, $table);

/*BUILD GREETING BASED ON USER INFO*/
   $greeting = "SELECT * FROM useraccounts WHERE userID='$userID'";
   $greetingresult = $conn->query($greeting);
   $messagerow = mysqli_fetch_assoc($greetingresult);
   //$fname = $messagerow["fname"];
   //$fname = $messagerow["fname"];
   $message= "Welcome, " .$messagerow["fname"] . " " .$messagerow["lname"] . ". Here are your recent transactions: <p></p>";

   $conn->close();
?>

<html>
      <head> <!This is the title of the webpage>
              <meta charset="utf-8">
              <title>View Transactions</title>
              <link rel="stylesheet" href="deposit.css">
      </head>
      <body>

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

            <div class = "leftcolumn" style= "width: 75%">
                  <div class = "column">
                        <h1> View Transactions </h1>
                        <?php echo $message ?>
                        <div class= display>
                          <?php
                                if ($tableresult->num_rows > 0) {
                                    echo "<table id=customers><tr><th>Date</th><th>Transaction Type</th><th>Account Number</th><th>Account Name</th></th><th>Transactions</th><th>File Uploaded</th></tr>";
                                    // output data of each row
                                    while($row = $tableresult->fetch_assoc()) {
                                        echo "<tr><td>".$row["date"]."</td><td>".$row["transType"]."</td><td>".$row["acctNum"]."</td><td>".$row["acctName"]."</td><td>$".$row["amount"]."</td><td>".$row["image"]."</td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "0 results";
                                }
                          ?>
                        </table>
                  </div>
            </div>

      </body>
    </html>
