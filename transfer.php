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

      $userID = 101010;
    ?>

    <div class="custom-select" style="width:200px;">
    <form action = "" method = post>
    <p class="title">Transfer from:
    <select name = "account1">
      <?php
        $result1 = mysqli_query($conn, "SELECT acctname from bankaccounts WHERE userID = '$userID'");
        // $resul2 = mysqli_query($conn, "SELECT acctnum from bankaccounts WHERE userID = '$userID'");

        while($row1 = $result1->fetch_assoc()):; //&& $row2 = $result2->fetch_assoc()?>
          <option value= "<?php echo $row1["acctname"];?>"><?php echo $row1["acctname"];?></option>
          <?php endwhile;?>
    </select></p>
    </div>

    <br>
    <br>
    <br>

    <form action = "" method = post>
    <p class="title">Transfer to:
    <select name = "account2">
      <?php
        $result1 = mysqli_query($conn, "SELECT acctname from bankaccounts WHERE userID = '$userID'");
        // $resul2 = mysqli_query($conn, "SELECT acctnum from bankaccounts WHERE userID = '$userID'");

        while($row1 = $result1->fetch_assoc()):; //&& $row2 = $result2->fetch_assoc();?>
          <option value= "<?php echo $row1["acctname"];?>"><?php echo $row1["acctname"];?></option>
          <?php endwhile;?>

        </select></p>

      <p>Amount to transfer</p>
      <input type="text" name="amount" id="transferAmnt">
      <input type = submit name = "submit">
    </form>
  </div>

  </body>
</html>

<?php


  if (isset($_POST['submit'])) {
       $account1 = $_POST['account1'];
       $account2 = $_POST['account2'];
       $amount = $_POST['amount'];

       $sql1 = mysqli_query($conn,"SELECT balance FROM bankaccounts WHERE userID = '$userID' AND acctname = '$account1'");
       $sql2 = mysqli_query($conn, "SELECT balance FROM bankaccounts WHERE userID = '$userID' AND acctname = '$account2'");

       $row1 = mysqli_fetch_assoc($sql1);
       $row2 = mysqli_fetch_assoc($sql2);

       $acctNum1 = $row1["balance"];
       $acctNum2 = $row2["balance"];


       if($acctNum1 < $acctNum2)
       {
          echo 'Insufficient funds.';
       }
       else if ($acctNum1 == $acctNum2)
       {
         echo 'Same account!';
       }
       else
       {

          $sum1 = $acctNum1 - $amount;
          $sum2 = $acctNum2 + $amount;


           mysqli_query($conn, "UPDATE bankaccounts set balance = '$sum1' WHERE userID = '$userID' AND acctname = '$account1'");
           mysqli_query($conn, "UPDATE bankaccounts set balance = '$sum2' WHERE userID = '$userID' AND acctname = '$account2'");


      }

  }

?>
