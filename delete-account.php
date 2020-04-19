<?php
    $conn = mysqli_connect("localhost", "root", "", "users");
    $sql = "select * from students";
    mysqli_query($conn,$sql);
    $records = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($records) ){
        echo "<tr>";
        echo "<td>".$row['username']."</td>";
        echo " password ";
        echo "<td>".$row['password']."</td>";
        echo "<br/>";
        echo "hello";
    }
    echo $_GET["name"];
    $delete = "delete from students where username='$_GET[name]'";
    echo $delete;
    if(mysqli_query($conn,$delete) ){
        echo "username could be deleted";
    }
    else{
        echo "username could not be found";
    }

?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<form method = "get">
username<input type="text" name ="name"><br>
<input type ="submit">
</form>

</body>
</html> 