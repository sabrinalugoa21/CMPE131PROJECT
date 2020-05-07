<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>

  <link rel="stylesheet" href="registerStyle.css">
  </head>

  <body>
    <!MENU BAR>
    <div id="mySidenav" class="sidenav">
     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
     <a href="">Checking Account</a>
     <a href="">Savings Account</a>
     <a href="">Investing</a>
     <a href="">Better Money Habits</a>
    </div>

    <div id="main">

     <div class="header">
       <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
       <!TOP BAR>
       <a href="homepage.php", class="logo", style="color: #FFFFE0">Corona Credit</a>
    </div>

    <div class="topnav">
           <a class="active" href="homepage.php">Home</a>
           <a href="homepage.php#news">News</a>
           <a href="homepage.php#contact">Contact</a>
           <a href="homepage.php#about">About</a>
           <div class="header-right">
              <a class="active" href="login.php">Login</a>
           </div>
    </div>
    <br>

  <div class = "row">
      <div class = "loginform">
        <h2>Register</h2>
    <form action = "register.php" method="post">
        <div class = "form-group">
          <label for ="First name"> First name:</label>
          <input name = "fname" type = "text">
        </div>
        <div class = "form-group">
          <label for = "Last name"> Last name: </label>
          <input name = "lname" type = "text">
      </div>
      <div class = "form-group">
        <label for = "Username"> Username: </label>
        <input name = "username" type = "text">
      </div>
        <div class = "form-group">
          <label for = "Pin"> PIN: </label>
          <input name = "pin" type = "password">
        </div>

      <!--div class = "form-group">
        <label for ="Password">Password: </label>
        <input type ="password" name="password">
      </div-->
      <div class = "form-group">
        <label for = "Email"> Email: </label>
        <input name = "email" type = "text">
      </div>
          <p><button type = "submit" name= "login-submit">Submit</button></p>
   </form>

  </div>
</div>
<?php
  if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["username"])
      /*&& isset($_POST["password"])*/ && isset($_POST["pin"]) && isset($_POST["email"])){
    if ($_POST["fname"] && $_POST["lname"] && $_POST["username"] && /*$_POST["password"] &&*/ $_POST["pin"]
        && $_POST["email"]){

    $userID = rand(100000,199999); //expand random number range if needed
    $fname = $_POST["fname"];
    $fnameValidation = $_POST["fname"];
    if (!preg_match("/^[a-zA-Z ]*$/",$fnameValidation)) {
      $nameErr = "Only letters and white space allowed";
      die("Only letters and white space allowed in first name");
    }

    $lname = $_POST["lname"];
    $lnameValidation = $_POST["lname"];
    if (!preg_match("/^[a-zA-Z ]*$/",$lnameValidation)) {
      $nameErr = "Only letters and white space allowed";
      die("Only letters and white space allowed in last name");
    }

    $username = $_POST["username"];
    //$password = $_POST["password"]; //Commented out password just in case

    $pin = $_POST["pin"];
    $pinValidation = $_POST["pin"];
    if (!preg_match("/^[0-9]*$/",$pinValidation)) {
      $nameErr = "Only letters and white space allowed";
      die ("only numbers are allowed into pin ");
}
/*
    pin input validation
    if it not a number it is invalid
    */

    $email = $_POST["email"];
    $emailValidation = $_POST["email"];
    if (!filter_var($emailValidation, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      die("invalid email");
    }
    /*
    email input validation
    if it does not have the @ and the . in emails, it will be invalid
    */
    //$acctnum = rand(100000,199999);


    //Create connection
    $conn = mysqli_connect("localhost", "root", "", "userbank"); //change "userbank" based on database name

    //Check connection
    if(!$conn){
        die("Connection failed" . mysqli_connect_error());
    }

    //Register user
    $sql = "INSERT INTO useraccounts (userID, fname, lname, username, /*password,*/ pin, email) VALUES
            ('$userID','$fname','$lname','$username','$pin','$email')";
    //$sql2 = "INSERT INTO accounts (userID) VALUES ('$userID')";


    // echo $sql;
    $results = mysqli_query($conn, $sql);


    /*if ($results) {
        $accounts = "SELECT * FROM accounts";
        $initialize = mysqli_query($conn, $accounts);
        /*BEGIN: initializing the checking and savings accounts*/

    if ($results) {
        echo "Registered."; //As a toast message
        $sql2 = "INSERT INTO accounts (userID, acctname, balance) VALUES
                ('$userID','Savings','0.00')"; //starting balance in each account is zero
            $results2 = mysqli_query($conn, $sql2);

        header('Location: login.php'); //Change location based on where project folder is saved.
      } else {
      echo mysqli_error($conn);
      echo "Error.";
    }

          mysqli_close($conn);

    } else {
      echo "A field is empty."; //Also as a toast message
    }
  }


    /*else {
      echo "Form was not submitted.";
    }*/
    ?>
  </body>
</html>
