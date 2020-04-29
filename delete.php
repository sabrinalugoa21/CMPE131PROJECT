<?php
//connnect to localhost
$conn = mysqli_connect("localhost","root","","bankaccount");
echo "connected! <br>";
//check connection
if(!$conn){
    die("Connection failed" . mysqli_connect_error());
}
//select $query
$sql = "DELETE FROM accounts WHERE acctNum = '$_GET[id]'";

//execute $query
if(mysqli_query($conn,$sql))
  header("refresh:1; url = deleteAccount.php");
else {
    echo "NOT DELETED";
}
?>
