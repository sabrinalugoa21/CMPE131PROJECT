<html>

<head> <!This is the title of the webpage>
  <meta charset="utf-8">
  <title>Delete Account</title>
  <link rel="stylesheet" href="deposit.css">
</head>

<div class = "row">
     <div id = "grad1", class = "header">
       <h1><p class = "custom1"> BANK NAME</p></h1>
    </div>
     <div id = "">
       <div class="topnav">
         <a href="logout.php" style="float: right;"> Sign Out</a>
         <a href="homepage.php" style="float: left;"> Return</a>
        </div>
</div>



<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","users");
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }
?>

  <div class="leftcolumn">
    <div class="account">
    <h2>Delete From Following:</h2>
    <?php
      if(isset($_SESSION['userID'])) {

      $userid = $_SESSION['userID'];

      //select $query
      $sql = "SELECT * FROM accounts WHERE userID = '$userID' AND balance = 0";
      $sql1 = "SELECT COUNT(*) FROM accounts where userID = '$userID' AND balance = 0";
      $rs = mysqli_query($conn,$sql1);
      $result1 = mysqli_fetch_array($rs);

      //execute $query
      if($result1[0] >= 1){
      $records = mysqli_query($conn,$sql);

      echo "<table border = 1 cellpadding = 1 cellspacing =1>
          <tr>
            <th>User ID</th>
            <th>Account Number</th>
            <th>Account Name</th>
            <th>Balance</th>
          </tr>";
      while($row = mysqli_fetch_array($records))
      {
        echo "<tr>";
        echo "<td>".$row['userID']."</td>";
        echo "<td>".$row['acctNum']."</td>";
        echo "<td>".$row['acctName']."</td>";
        echo "<td>".$row['balance']."</td>";
        echo "<td><a href = delete.php?id=".$row['acctNum'].">Delete</a></td>";

      }
      echo "</table>";

      $results = mysqli_query($conn, $sql);
      if ($results) {
          echo ""; //As a toast message
          //we can output the account info after
      } else {
          echo mysqli_error($conn);
          echo "something";
        }

    }
  }  elseif ($result1[0] <= 1) {
    echo "User must have at least 1 active account";
  }
  ?>
  </div>
  </div>

  <div class="rightcolumn">
    <div class="account">
      <h2>Transfer all funds before deleting<br></h2>

      <?php
      if(isset($_SESSION['userID'])) {

      $userid = $_SESSION['userID'];

      //select $query
      $sql = "SELECT * FROM accounts WHERE userID = '$userID' AND balance != 0";
      $sql1 = "SELECT COUNT(*) FROM accounts where userID = '$userID' AND balance != 0";
      $rs = mysqli_query($conn,$sql1);
      $result1 = mysqli_fetch_array($rs);

      //execute $query
      if($result1[0] >= 1){
      $records = mysqli_query($conn,$sql);
      echo "<table border = 1 cellpadding = 1 cellspacing =1>
          <tr>
            <th>User ID</th>
            <th>Account Number</th>
            <th>Account Name</th>
            <th>Balance</th>
          </tr>";
      while($row = mysqli_fetch_array($records))
      {
        echo "<tr>";
        echo "<td>".$row['userID']."</td>";
        echo "<td>".$row['acctNum']."</td>";
        echo "<td>".$row['acctName']."</td>";
        echo "<td>".$row['balance']."</td>";
        echo "<td><a href = transfer.php?id=".$row['acctNum'].">Transfer</a></td>";

      }
      echo "</table>";

      $results = mysqli_query($conn, $sql);
      if ($results) {

      } else {
          echo mysqli_error($conn);
      }
    }
  } else if ($result1[0] <= 1) {
    echo "User must have at least 1 active account";
  }
  ?>
    </div>
  </div>
</html>
