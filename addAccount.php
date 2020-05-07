<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","userbank");
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }
  //sql to list accounts
  $query = "SELECT * FROM accounts";
  $result1 = mysqli_query($conn, $query);


  /*BEGIN: ADD AN ACCOUNT*/
  if (isset($_POST["acctName"]))
  {
    if ($_POST["acctName"])
    {
      $userid = $_SESSION['userID'];
      $acctname= $_POST['acctName'];
      $balance = $_POST['balance'];
     
      //expand random number range if needed
      //Register user
      $sql = "INSERT INTO accounts (userID, acctName, balance) VALUES
      ('$userid','$acctname','$balance')";//starting balance in each account it zero
      // echo $sql;
      $results = mysqli_query($conn, $sql);
      if ($results) {
        header("Location: /customAccounts.php"); 
      } else {
        echo mysqli_error($conn);
        echo "something 1";
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
          <label for = "acctName"> account name: </label>
          <input name = "acctName" type = "text" required>
          <p></p>
          <label for = "balance"> initial balance: </label>
          <input name = "balance" type = "number" required>
          <p></p>
        </div>
        <input type = "submit" name = "submit" id = "submit">
      </form>
    </div>
  </div>
</body>
</html>
