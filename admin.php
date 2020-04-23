<?php
  $logged_in = false;

  if( isset($_POST["username"]) && isset($_POST["password"])){
    if($_POST["username"] && $_POST["password"]){
      $username = $_POST["username"];
      $password = $_POST["password"];

      $conn = mysqli_connect("localhost","root","","users");
      if(!$conn)
      {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT password FROM student WHERE username = '$username'";

      $results = mysqli_query($conn, $sql);
      if($results)
      {
        $row = mysqli_fetch_assoc($results);

        if( $row["password"] === $password)
        {
          $logged_in = true;
          $sql = "SELECT * FROM student";
          $results = mysqli_query($conn, $sql);
        } else
        {
          echo "password incorrect";
        }
      } else {
        echo mysqli_error($conn);
      }

      mysqli_close($conn);
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
