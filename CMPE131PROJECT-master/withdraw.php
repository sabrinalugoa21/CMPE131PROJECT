<html>
<body>
<form>
    <p>Account #: <input type="number" name = "accountNumber"> </p>
    <p>PIN #: <input type="number" name = "pin"> </p>
    <p>Amount to withdraw($): <input type="number" name = "amount"> </p>
    <input type="submit">
</form>
</body>
</html>

<?php

    $conn = mysqli_connect("localhost", "root", "", "users");
    if(!'conn'){
        die("connection failed");
    }
    // echo $_GET["account"];
    // echo $_GET["pin"];
    $account = $_GET['accountNumber'];
    $pin = $_GET['pin'];
    $balance = $_GET['amount'];

    //finds the balance from the database
    $balanceQuery = "SELECT accountBalance FROM bankAccount WHERE accountNumber = $account";
    $dbBalance_ = mysqli_query($conn,$balanceQuery);
    $resultCheck = mysqli_num_rows($dbBalance_);
    while($row = mysqli_fetch_assoc($dbBalance_) ){
        // echo $row['accountBalance'];
        // echo "accountBalance";
        // echo $balance;
        // echo "balance";
        $temp = $row['accountBalance'];
    }
    echo $temp;
    echo "";
    echo " ";
    echo $balance;
    echo " ";
    $finalBalance = $temp - $balance;
    echo $finalBalance;
    echo "finalbalance ";

    $sql = "UPDATE bankAccount SET accountBalance = $finalBalance WHERE accountNumber = $account" ;
    echo $sql;
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "The data has been added correctly";
    }
    else{
        echo mysqli_error($conn);
        echo "THERE IS AN ERROR";
    }
    mysqli_close($conn);
    // mysqli_query($conn,$sql);
    // $records = mysqli_query($conn,$sql);
    // while($row = mysqli_fetch_array($records) ){
    //     echo "<tr>";
    //     echo "<td>".$row['username']."</td>";
    //     echo " password ";
    //     echo "<td>".$row['password']."</td>";
    //     echo "<br/>";
    // }

?>
   