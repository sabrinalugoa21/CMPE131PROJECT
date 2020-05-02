<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>transfer</title>
  </head>
  <body>
    <h1>Transfer</h1>
    
    <div class="custom-select" style="width:200px;">
      <p class="title">Transfer from:</p>
    <select>
      <option value="0"></option>
      <option value="1">Checkings</option>
      <option value="2">Savings</option>
      <option value="3">Other</option>
    </select>
    <div class = "selection">
      <input type="text" name="other" id="otherBank">
    </div>

    <br>
    <br>
    <br>

    <p class = "title">Transfer to:</p>
    <select>
      <option value="0"></option>
      <option value="1">Checkings</option>
      <option value="2">Savings</option>
      <option value="3">Other</option>
    </select>
   <div class = "selection">
      <input type="text" name="other" id="otherBank">

      <p>Amount to transfer</p>
      <input type="text" name="amount" id="transferAmnt">
      <input type = submit name = "submit">
    </div>
  </div>
  </body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "users"); // check connection

if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}

  if (isset($_POST["1"]) && isset($_POST["2"]) && isset($_POST["account"])) {

    if ($_POST["1"] && $_POST["2"] && $_POST["account"]) {
       $sql1 = mysqli_query("SELECT balance FROM bankAccounts WHERE acctnum = '$acctnum'");
       $sql2 = mysqli_query("SELECT balance FROM bankAccount WHERE acctnum = '$acctnum'");

       $sum1 = $sql1 - $account;
       $sum2 = $sql2 + $account;

       mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql1', '$sum1') FROM bankAccounts WHERE balance = '$sql1'");

       mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql2', '$sum2') FROM bankAccounts WHERE balance = '$sql2'");
     }
   }
  else if (isset($_POST["1"]) && isset($_POST["other"]) && isset($_POST["account"])) {

      if ($_POST["1"] && $_POST["other"] && $_POST["account"]) {

         $sql1 = mysqli_query("SELECT balance FROM bankAccounts WHERE acctnum = '$acctnum'");
         $sql2 = mysqli_query("SELECT balance FROM bankAccount WHERE acctnum = '$acctnum'");

         $sum1 = $sql1 - $account;
         $sum2 = $sql2 + $account;

         mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql1','$sum1') FROM bankAccounts WHERE balance = '$sql1'");

         mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql2','$sum2') FROM bankAccounts WHERE balance = '$sql2'");
    }
  }
  else if (isset($_POST["2"]) && isset($_POST["other"]) && isset($_POST["account"])) {
    if ($_POST["2"] && $_POST["other"] && $_POST["account"]) {

       $sql1 = mysqli_query("SELECT balance FROM bankAccounts WHERE acctnum = '$acctnum'");
       $sql2 = mysqli_query("SELECT balance FROM bankAccount WHERE acctnum = '$acctnum'");

       $sum1 = $sql1 - $account;
       $sum2 = $sql2 + $account;

       mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql1', '$sum1') FROM bankAccounts WHERE balance = '$sql1'");

       mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql2', '$sum2') FROM bankAccounts WHERE balance = '$sql2'");
       }
     }
     else if (isset($_POST["2"]) && isset($_POST["1"]) && isset($_POST["account"])) {
       if ($_POST["2"] && $_POST["1"] && $_POST["account"]) {

          $sql1 = mysqli_query("SELECT balance FROM bankAccounts WHERE acctnum = '$acctnum'");
          $sql2 = mysqli_query("SELECT balance FROM bankAccount WHERE acctnum = '$acctnum'");

          $sum1 = $sql1 - $account;
          $sum2 = $sql2 + $account;

          mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql1', '$sum1') FROM bankAccounts WHERE balance = '$sql1'");

          mysqli_query($conn, "SELECT acctnum, balance, REPLACE(balance,'$sql2', '$sum2') FROM bankAccounts WHERE balance = '$sql2'");
        }
      }
?>
