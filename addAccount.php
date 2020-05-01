<html>
<head> <!This is the title of the webpage>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bank Name</title>
  <link rel="stylesheet" href="addAccount.css">
</head>

  <body>
    <div class="header">
      <!TOP BAR>
      <a href="addAccount.php", class="logo", style="color: #FFFFE0">Bank Name</a>
    </div>

    <div class="topnav">
      <a class="active" href="#home">Home</a>
    </div>


    <div class="center">
        <form action = "addAccount.php" method="post">
            <div class = "form-group">
              <label for = "acctName"> account name: </label>
              <input name = "acctName" type = "text">
            </div>
            <input type = "submit" name = "submit" id = "submit">
       </form>

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
    </div>
  </body>
</html>

<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","bankaccount");
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
 //expand random number range if needed
    //Register user
    $sql = "INSERT INTO accounts (userID, acctName, balance) VALUES
            ('$userid','$acctname','0')";//starting balance in each account it zero
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
