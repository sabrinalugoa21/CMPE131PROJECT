
<?php
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
  if (isset($_POST["userID"])&& isset($_POST["acctName"]))
  {
    if ($_POST["userID"] && $_POST["acctName"])
    {
    $userid = $_POST['userID'];
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
<html>
  <body>
    //ADD an ACCOUNT
        <form action = "addAccount.php" method="post">
            <div class = "form-group">
              <label for = "userID"> UserID: </label>
              <input name = "userID" type = "text">
          </div>
            <div class = "form-group">
              <label for = "acctName"> account name: </label>
              <input name = "acctName" type = "text">
            </div>
            <input type = "submit" name = "submit" id = "submit">
       </form>
  </body>
</html>
