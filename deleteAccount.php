<html>
  <table border = 1 cellpadding = 1 cellspacing =1>
    <tr>
      <th>User ID</th>
      <th>Account Number</th>
      <th>Account Name</th>
      <th>Balance</th>
    </tr>
    <?php
      //connnect to localhost
      $conn = mysqli_connect("localhost","root","","bankaccount");
      echo "connected! <br>";
      //check connection
      if(!$conn){
          die("Connection failed" . mysqli_connect_error());
      }
      //select $query
      echo "Accounts whose balance is zero are only displayed<br>";
      $sql = "SELECT * FROM accounts WHERE balance = 0";

      //execute $query
      $records = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($records))
      {
        echo "<tr>";
        echo "<td>".$row['userID']."</td>";
        echo "<td>".$row['acctNum']."</td>";
        echo "<td>".$row['acctName']."</td>";
        echo "<td>".$row['balance']."</td>";
        echo "<td><a href = delete.php?id=".$row['userID'].">Delete</a></td>";

      }
      $results = mysqli_query($conn, $sql);
      if ($results) {
          echo "."; //As a toast message
          //we can output the account info after
      } else {
          echo mysqli_error($conn);
          echo "something";
        }
    ?>
  </table>

</html>
