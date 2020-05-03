<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","userbank");
  echo "connected! <br>";
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }

  //sql to list accounts

  echo $_POST["acctName"];
  $initial = $_POST["acctName"];
//   echo "initial balance";
  $query = "SELECT * FROM accounts WHERE acctName = $initial";
  $result1 = mysqli_query($conn, $query);
  if($result1){
      echo " ";
  }
  else{
      echo "something is wrong";
  }
  while($row=mysqli_fetch_assoc($result1)) {
    print_r($row["balance"]);
    echo "-";
    print_r($row["acctName"]);
    // echo "hello";
    echo "<br>";
    $money = $row["balance"];
    } 
    echo $money;
    echo "this is the money in the database";

    $withdrawMoney = $_POST["balance"];
    echo $withdrawMoney;
    echo "money to withdraw";
    echo "<br>";
    $final = $money - $withdrawMoney;
    echo $final;
    echo "this is the final amount after transaction";
    $newSQL = "UPDATE accounts SET balance = $final WHERE acctName = '$initial'";
    echo $newSQL;
    echo "<br>";
    $mysql = mysqli_query($conn,$newSQL);
    if($mysql){
      echo "added";
    }
    else{
      echo mysqli_error($conn);
      echo " something 1";
    }
    
// /*BEGIN: ADD AN ACCOUNT*/
  
//     $userid = $_SESSION['userID'];
//     $acctname= $_POST['acctName'];
//     $balance = $_POST['balance'];
//     echo $balance;
//     echo $acctname;
//  //expand random number range if needed
//     //Register user
//     $sql = "INSERT INTO accounts (userID, acctName, balance) VALUES
//             ('$userid','$acctname','$balance')";//starting balance in each account it zero
//     // echo $sql;
//     $results = mysqli_query($conn, $sql);
//     if ($results) {
//         echo "Added."; //As a toast message
//         //we can output the account info after
//     } else {
//         echo mysqli_error($conn);
//         echo "something 1";
//       }
   
//   // Close connection
//   mysqli_close($conn);
// /*END: ADD AN ACCOUNT*/
?>
<html>
  <body>
    //ADD an ACCOUNT
        <!-- <form action = "addAccount.php" method="post">
            <div class = "form-group">
              <label for = "acctName"> account name: </label>
              <input name = "acctName" type = "text">

            </div>
            <input type = "submit" name = "submit" id = "submit">
       </form> -->
  </body>
</html>


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
                        <h1> Register Account</h1>
                        <form action = "withdraw.php" method="post">
                          <div class = "form-group">
                            <label for = "acctName"> account name: </label>
                            <input name = "acctName" type = "text">

                            <label for = "balance"> initial balance: </label>
                            <input name = "balance" type = "number">
                          </div>
                          <input type = "submit" name = "submit" id = "submit">
                        </form>
                       </div>
                  </div>

  </body>
</html>
<main>
      <?php
            if(isset($_SESSION['username'])){
                  echo '<p>Logged IN</p>';
                  echo("Session ID: " .$_SESSION['userID']);
            }
            else{
                  echo '<p>Logged OUT</p>';
            }
      ?>
</main>