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
    echo $balance;
 //expand random number range if needed
    //Register user
    $sql = "INSERT INTO accounts (userID, acctName, balance) VALUES
            ('$userid','$acctname','$balance')";//starting balance in each account it zero
    // echo $sql;
    $results = mysqli_query($conn, $sql);
    if ($results) {
        echo "Added."; //As a toast message
        //we can output the account info after
    } else {
        echo mysqli_error($conn);
        echo "something";
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
                        <form action = "addAccount.php" method="post">
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
