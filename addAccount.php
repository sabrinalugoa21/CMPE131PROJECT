<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","users");
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }
  //sql to list accounts
  $query = "SELECT * FROM bankaccounts";
  $result1 = mysqli_query($conn, $query);

  $message = "";
  /*BEGIN: ADD AN ACCOUNT*/
  if (isset($_POST["acctName"]))
  {
    if ($_POST["acctName"])
    {
      $valid = TRUE;
      $userid = $_SESSION['userID'];
      $acctname= $_POST['acctName'];
      $balance = $_POST['balance'];
      //expand random number range if needed
      //Register user
<<<<<<< HEAD
      $sql = "INSERT INTO bankaccounts (userID, acctName, balance) VALUES
      ('$userid','$acctname','$balance')";//starting balance in each account it zero
      // echo $sql;
      $results = mysqli_query($conn, $sql);
      if ($results) {
        echo "Added."; //As a toast message
        //we can output the account info after
      } else {
        echo mysqli_error($conn);
        echo "something 1";
=======

      $validation = "SELECT acctName FROM accounts WHERE userID='$userid' AND acctName = '$acctname' ";

      $valresult = $conn->query($validation);

      if ($valresult->num_rows > 0) {
        while($valrow = $valresult->fetch_assoc()) {
             if ($valrow["acctName"] == $acctname){      //if there's already an acct with that name
                   $valid = FALSE;
             }
        }
      }

      if ($valid){
            $amountValidation = $_POST["balance"];
          if (!preg_match("/^[0-9]*$/",$amountValidation)) {
                $nameErr = "Only letters and white space allowed";
               $message = "<b>Error:</b> Only numbers allowed.";
          }
          else if ($balance <= 0){
                 $message = "<b>Error:</b> Please enter a dollar amount greater than zero.";
          }
          else{
                  $sql = "INSERT INTO accounts (userID, acctName, balance) VALUES
                  ('$userid','$acctname','$balance')";//starting balance in each account it zero
                  // echo $sql;
                  $results = mysqli_query($conn, $sql);
                  if ($results) {
                    $message =  "New account added: $acctname [Balance: $$balance]"; //As a toast message
                    //we can output the account info after
                  } else {
                    echo mysqli_error($conn);
                    echo "something 1";
                  }
            }
      }
      else {
            $message =  "Error: You already have a bank account with that name. Please choose a new name.";
>>>>>>> 0c0a2fb5ecc80e453d338eb80acf9d95f0d2fa60
      }
    } else {
      echo "A field is empty."; //Also as a toast message
    }
  }
  // Close connection
  mysqli_close($conn);
  /*END: ADD AN ACCOUNT*/
?>

<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Add Account</title>
    <link rel="stylesheet" href="addAccount.css">
  </head>

  <body>  <!This is the title page>
    <div class = "row">
      <div id = "grad1", class = "header">
        <h1><p class = "custom1">Corona Credit</p></h1>
      </div>
      <div class="topnav">
      	<a href="" style="float: right;"> Sign Out</a>
      	<a href="test_userpage.php" style="float: left;"> User Page</a>
      </div>
    </div>
<br>
    <div class = "column">
    <div class = "account">
      <h1> Register Account</h1>
      <form action = "addAccount.php" method="post">
        <div class = "form-group">
          <label for = "acctName"> Account Name: </label>
          <input name = "acctName" type = "text" required>
          <p></p>
          <label for = "balance"> Initial Balance ($): </label>
          <input name = "balance" type = "number" required>
          <p></p>
        </div>
        <button type = "submit" name = "submit" id = "submit">Add Account</button>
      </form>
      <?php
            echo $message;
       ?>
    </div>
  </div>
</body>
</html>
