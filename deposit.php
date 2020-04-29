<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Deposit</title>
    <link rel="stylesheet" href="deposit.css">
  </head>

  <body>  <!This is the title page>
      <div class = "row">
          <div id = "grad1", class = "header"><h1>
           <p class = "custom1"> BANK NAME</p>
         </h1></div>
          <div id = ""
      		<div class="topnav">
      			<a href="" style="float: right;"> Sign Out</a>
      			<a href="userpage2.php" style="float: left;"> Return</a>
      				</div>
      			</div>

          <div class = "rightcolumn">
                <div class= "account">
                       <h2> Navigation </h2>
                       <a href="userpage2.php" style="float: left;"> Home</a>
                       <a href= "" style= "float: left;"> Account Settings</a>
                       <a href= "" style= "float: left;"> </a>
                </div>
          </div>

            <div class = "leftcolumn">
                  <div class = "column">
                        <h1> Deposit to Account</h1>
                        <form>
                          <p>Account #: <input type="number" name = "accountNumber"> </p>
                          <p>PIN #: <input type="number" name = "pin"> </p>
                          <p>Amount ($): <input type="number" name = "amount"> </p>
                          <input type="submit">
                        </form>
                       </div>
                  </div>

  </body>
</html>


<?php

    $conn = mysqli_connect("localhost", "root", "", "users");
    if(!'conn'){
        die("connection failed");
    }
    // echo $_GET["account"];
    // echo $_GET["pin"];
    if( isset($_GET["accountNumber"]) && isset($_GET["pin"]) && isset($_GET["amount"])){
      $account = $_GET['accountNumber'];
      $pin = $_GET['pin'];
      $balance = $_GET['amount'];

      $sql = "INSERT INTO bankAccount(accountNumber, pin,accountBalance) VALUES('$account','$pin','$balance') ";
      echo $sql;
      $result = mysqli_query($conn, $sql);
      if($result){
          echo "The data has been added correctly";
      }
      else{
          echo mysqli_error($conn);
          echo "THERE IS AN ERROR";
      }
      mysqli_close($conn);

  }//iset ending bracket


  // mysqli_query($conn,$sql);
    // $records = mysqli_query($conn,$sql);
    // while($row = mysqli_fetch_array($records) ){
    //     echo "<tr>";
    //     echo "<td>".$row['username']."</td>";
    //     echo " password ";
    //     echo "<td>".$row['password']."</td>";
    //     echo "<br/>";
    // }
    

?>


   






