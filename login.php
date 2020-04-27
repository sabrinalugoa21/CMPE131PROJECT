<?php
if (isset($_POST["username"]) && isset($_POST["password"])){

      $conn = mysqli_connect("localhost", "root", "", "userbank");

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
            $sql = "SELECT * FROM useraccounts WHERE userID=? OR email=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "first if error";
                  exit();
            }
            else{
                  mysqli_stmt_bind_param($stmt, "si", $username, $username);
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  if ($row = mysqli_fetch_assoc($result)){
                        $pwdCheck = password_verify($pin, $row['pin']);
                        echo ( 'Pin: '.$row['pin'] );
                        if(!($pin == $row['pin'])){
                              echo "password check error";
                        }
                        else{
                              session_start();
                              $_SESSION['userID']= $row['userID'];

                              echo("Session ID: " .$_SESSION['userID']);
                              $_SESSION['fname']= $row['fname'];
                              $_SESSION['lname']= $row['lname'];
                              $_SESSION['username']= $row['username'];
                              $_SESSION['email']= $row['email'];

                        }
                  }
                  else{
                        echo "error found";
                  }
            }
      }
}
else {
      echo "A field is empty."; //will remove this once I figure some stuff out
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <link rel="stylesheet" href="registerStyle.css">
	<!At this point in time, I will be using the registerStyle for the login page as well>
  </head>
  <body>
        <div class="header">
         <!TOP BAR>
         <a href="homepage.php", class="logo", style="color: #FFFFE0">Bank Name</a>
       </div>
  <div id= "form">
    <form action = "login.php" method="post">
	<! Login currently set to use username and password for login, may want to include email option>
            <input type= "text" name = "username" placeholder = "username/email">
            <input type= "text" name = "password" placeholder = "pin">
      <button type = "submit" name= "login-submit">Login</button>
	</form>
      <main>
            <?php
                  if(isset($_SESSION['username'])){
                        echo '<p>Logged IN</p>';
                  }
                  else{
                        echo '<p>Logged OUT</p>';
                  }
            ?>
      </main>
