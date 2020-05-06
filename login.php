<?php
$errorMessage = "";
$conn = mysqli_connect("localhost", "root", "", "userbank");
if (isset($_POST["username"]) && isset($_POST["password"])){
      if(isset($_SESSION['username'])){ //if the login is broken, check that this didn't break it 
            session_start();
            session_unset();
            session_destroy();
      }

      if(!$conn){
          die("Connection failed" . mysqli_connect_error());
      }

      $username = $_POST['username'];
      $pin = $_POST['password'];

      if (empty($username) || empty($pin)){
            echo "variables empty";
            exit();
      }
      else {
            $sql = "SELECT * FROM useraccounts WHERE username=?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "first if error";
                  exit();
            }
            else{
                  //mysqli_stmt_bind_param($stmt, "si", $username, $username);
                  mysqli_stmt_bind_param($stmt, "s", $username);
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  if ($row = mysqli_fetch_assoc($result)){
                        $pwdCheck = password_verify($pin, $row['pin']);
                        if(!($pin == $row['pin'])){
                              $errorMessage = "<b>Error:</b> Sign in failed. Incorrect username or password.";
                        }
                        else{
                              session_start();
                              $_SESSION['userID']= $row['userID'];
                              $_SESSION['fname']= $row['fname'];
                              $_SESSION['lname']= $row['lname'];
                              $_SESSION['username']= $row['username'];
                              $_SESSION['email']= $row['email'];
                              header('Location: /test_userpage.php');
                        }
                  }
                  else{
                        echo "error found";
                  }
            }
      }
}
else {
      echo ""; //will remove this once I figure some stuff out
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <link rel="stylesheet" href="homepage.css">
	<!At this point in time, I will be using the registerStyle for the login page as well>
</head>

<body><!This is the login page>
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
   <a href="homepage.php", class="logo", style="color: #FFFFE0">Bank Name</a>
</div>

<div class="topnav">
       <a class="active" href="homepage.php">Home</a>
       <a href="homepage.php#news">News</a>
       <a href="homepage.php#contact">Contact</a>
       <a href="homepage.php#about">About</a>
       <div class="header-right">
          <a class="active" href="register.php">Register</a>
       </div>
</div>
<br>


      <div class = "row">
                  <div class= "loginform">
                         <h2>Login</h2>
                              <p style = "color: red; text-align: center;" ><?php echo $errorMessage ?></p>
                            <form action = "login.php" method="post">
                                    <p><input type= "text" name = "username" placeholder = "username" required></p>
                                    <p><input type= "password" name = "password" placeholder = "pin" required></p>
                              <p><button type = "submit" name= "login-submit">Login</button></p>
                              </form>
                              <main>
                                    <?php
                                          if(isset($_SESSION['username'])){
                                                echo '<p>Logged IN</p>';
                                          }
                                          else{
                                                echo '<p style= "text-align: center;">Don\'t have an account yet? ';
                                                echo '<a href="register.php">Register here.</a></p>';
                                          }
                                    ?>
                              </main>
                        </div>
            </div>
</body>
