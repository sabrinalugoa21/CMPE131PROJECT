
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Main Page</title>
  </head>
  <body>
    <h1>Register for an account</h1>

    <form action = "register.php" method="post">
      <p>First name: </p><input type= "text" name = "firstName">
      <p>Last name: </p><input type = "text"  name = "lastName">
      <p>Username: </p><input type="text" name="username">
      <br>
      <p>Password: </p><input type="text" name="password">
      <br>
      <p>Email: </p><input type = "text" name = "email">
      <input type="submit" name = "submit">
    </form>


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
