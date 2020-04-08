
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>

    <link rel="stylesheet" href="registerStyle.css">
  </head>
  <body>
    <h1>Sign up for an Account</h1>

<div id= "form">
    <form action = "register.php" method="post">
        <div class = "form-group">
          <label for ="First name"> First name:</label>
          <input name = "First name" id = "First name" />
        </div>
        <div class = "form-group">
          <label for = "Last name"> Last name: </label>
          <input name = "Last Name" id = "Last Name">
      </div>
      <div class = "form-group">
        <label for = "Username"> Username: </label>
        <input name = "Username" id = "Username">
      <div class = "form-group">
        <label for ="Password">Password: </label>
        <input name ="Password" id = "Password">
      </div>
      <div class = "form-group">
        <label for = "Email"> Email: </label>
        <input name = "Email" id = "Email">
      </div>
        <input type = "submit" name = "submit" id = "submit">
   </form>
</div>

    <?php
    if(isset($_POST['submit'])){
      if( isset($_POST["username"]) && isset($_POST["password"])){
        if($_POST["username"] && $_POST["password"]){
          $username = $_POST["username"];
          $password = $_POST["password"];


          $conn = mysqli_connect("localhost","root","","users");

          if(!$conn)
          {
            die("Connection failed: " . mysqli_connect_error());
          }

          $query = mysqli_query($conn, "SELECT * FROM student WHERE username = '$username'");

          if(mysqli_num_rows($query) > 0)
          {
            echo "Username already exists!";
          }
          else
          {
            mysqli_query($conn, "INSERT INTO student (username, password) VALUES ('$username',
              '$password')");

            header("location:Login.php");
          }

          mysqli_close($conn);

         } else {
            header("location:main.php");
            echo "Username or password is empty.";
        }
      } else {
          echo "Form was not submitted.";
      }
    }
    else
    {

    }

      ?>
  </body>
</html>
