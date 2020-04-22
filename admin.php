<?php
  $logged_in = false;

  if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["username"])
      && isset($_POST["password"]) && isset($_POST["email"])){
    if ($_POST["fname"] && $_POST["lname"] && $_POST["username"] && $_POST["password"]
        && $_POST["email"]){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

      // Create connection
      $conn = mysqli_connect("localhost","root","","users");

      //Check connection
      if(!$conn)
      {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT password FROM bankaccount WHERE username = '$username'";

      $results = mysqli_query($conn, $sql);

      if($results){
        $row = mysqli_fetch_assoc($results);

        if( $row["password"] === $password){
          $logged_in = true;
          $sql = "SELECT * FROM bankaccount";
          $results = mysqli_query($conn, $sql);
        } else
        {
          echo "Password incorrect";
        }
      } else {
        echo mysqli_error($conn);
      }

      mysqli_close($conn); // close connection
      
    } else {
      echo "Nothing was submitted.";
    }
  }
 ?>
 <html>
   <head>
     <title>Admin</title>
   </head>
   <body>
     <h1>Admin Panel</h1>
     <form action="/admin.php" method="post">
       <input type="text" name="username">
       <input type="password" name="password">
       <input type="submit">
     </form>
     <table>
       <thead>
         <tr>
           <th>username</th>
           <th>password</th>
         </tr>
       </thead>
       <tbody>
        <?php
         if ($logged_in && $results)
         {
           while ($row = mysqli_fetch_assoc($results))
           {
             echo "<tr>";
             echo "<td>" . $row["username"] . "</td>";
             echo "<td>" . $row["password"] . "</td>";
             echo "</tr>";
           }
         }
        ?>
       </tbody>
     </table>
   </body>
 </html>
