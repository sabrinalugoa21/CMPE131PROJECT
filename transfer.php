<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>transfer</title>
  </head>
  <body>
    <h1>Transfer</h1>
    <?php
      session_start();

      $conn = mysqli_connect("localhost", "root", "", "users"); // check connection

      if (!$conn)
      {
        die("Connection failed: " . mysqli_connect_error());
      }

      $userID = $_SESSION['userID'];
    ?>

    <div class="custom-select" style="width:200px;">
      <p class="title">Transfer from:</p>

    <select name = "account">
      <?php

        $result1 = mysqli_query($conn, "SELECT acctname from bankaccounts WHERE userID = '$userID'");
        $resul2 = mysqli_query($conn, "SELECT acctnum from bankaccounts WHERE userID = '$userID'");

        while($row1 = $result1->fetch_assoc() && $row2 = $result2->fetch_assoc())
        {
          $acctname = $row1['acctname'];
          $acctnum = $row2['acctnum'];
          echo "<option value = '$acctname'>$acctname</option>";
          echo"<option value = '$acctnum'>$acctnum</>"
        }

      ?>
      <option value="0"></option>
      <?php
       echo "<option value='$result1'>Checkings $result1</option>";
       echo "<option value='$result2'>Savings $result2 </option>";
       ?>
    </select>
    <div class = "selection">
    </div>

    <br>
    <br>
    <br>

    <p class = "title">Transfer to:</p>
    <select>
      <option value="0"></option>
      <?php
        echo "<option value="$result1">Checkings $result1</option>";
        echo "<option value="$result2">Savings $result2</option>";
        ?>
    </select>
   <div class = "selection">

      <p>Amount to transfer</p>
      <input type="text" name="amount" id="transferAmnt">
      <input type = submit name = "submit">
    </div>
  </div>

  </body>
</html>

<?php


  if (isset($_POST["$result1"]) && isset($_POST["$result2"]) && isset($_POST["account"])) {

    if ($_POST["$result1"] && $_POST["$result2"] && $_POST["account"]) {
       $sql1 = mysqli_query("SELECT balance FROM bankaccounts WHERE acctnum = '$result1'");
       $sql2 = mysqli_query("SELECT balance FROM bankaccounts WHERE acctnum = '$result1'");

       if($sql1 < $sql2)
       {
         echo 'Insufficient funds.';
       }
       else
       {
          $sum1 = $sql1 - $account;
          $sum2 = $sql2 + $account;


           mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql1', '$sum1')
           FROM bankaccounts WHERE balance = '$sql1'");

           mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql2', '$sum2')
           FROM bankaccounts WHERE balance = '$sql2'");
        }
     }
   }
  else if (isset($_POST["$result2"]) && isset($_POST["$result1"]) && isset($_POST["account"])) {

      if ($_POST["$result2"] && $_POST["$result1"] && $_POST["account"]) {

         $sql1 = mysqli_query("SELECT balance FROM bankaccounts WHERE acctnum = '$result2'");
         $sql2 = mysqli_query("SELECT balance FROM bankaccounts WHERE acctnum = '$result1'");

         if($sql1 < $sql2)
         {
           echo 'Insufficient funds.';
         }
         else
         {
           $sum1 = $sql1 - $account;
           $sum2 = $sql2 + $account;


           mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql1','$sum1')
           FROM bankaccounts WHERE balance = '$sql1'");

           mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql2','$sum2')
           FROM bankaccounts WHERE balance = '$sql2'");
        }
    }
  }

?>
