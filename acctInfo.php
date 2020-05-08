<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","userbank");
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }

  $message = "";
  $message2 = "";
  $userID = $_SESSION['userID'];

  $sql = "SELECT acctNum, balance FROM accounts WHERE userID='$userID'";
  $result = $conn->query($sql);

      $row = $result->fetch_assoc();

      $acctNum = $row["acctNum"];
      $balance = $row["balance"];

      if(isset($_POST['SubmitButton'])){
            $pin_verify = $_POST["pin_verify"];

            $verify = "SELECT pin FROM useraccounts WHERE userID='$userID'";
            $result_verify = $conn->query($verify);

                $verify_row = $result_verify->fetch_assoc();
                $userPin = $verify_row["pin"];

                if ($userPin == $pin_verify){   //if correct pin is entered...
                      $ItemToChange = $_POST["toChange"];
                      $NewValue = $_POST["new_value"];

                      if($ItemToChange == ""){ //value was not selected from dropdown
                           $message = "Error: Please select a value to change.";
                        }
                        else {
                              if($ItemToChange == "change_username"){   //username
                                    $changed_value = "UPDATE useraccounts SET username='$NewValue' WHERE userID='$userID'";
                                    if ($conn->query($changed_value) === TRUE) {
                                       $message = "Success, username changed to $NewValue.";
                                       $_SESSION['username'] = $NewValue;
                                   } else {
                                       $message = "Error updating record: " . $conn->error;
                                   }
                              }
                              else if($ItemToChange == "change_fname"){ //first name
                                    if (!preg_match("/^[a-zA-Z ]*$/",$NewValue)) {
                                      $message = "Error: Only letters allowed when changing name.";
                                    }
                                    else{
                                          $changed_value = "UPDATE useraccounts SET fname='$NewValue' WHERE userID='$userID'";
                                          if ($conn->query($changed_value) === TRUE) {
                                             $message = "Success, first name changed to $NewValue.";
                                             $_SESSION['fname'] = $NewValue;
                                         } else {
                                             $message = "Error updating record: " . $conn->error;
                                         }
                                    }
                              }
                              else if($ItemToChange == "change_lname"){ //last name
                                    if (!preg_match("/^[a-zA-Z ]*$/",$NewValue)) {
                                      $message = "Error: Only letters allowed when changing name.";
                                    }
                                    else{
                                          $changed_value = "UPDATE useraccounts SET lname='$NewValue' WHERE userID='$userID'";
                                          if ($conn->query($changed_value) === TRUE) {
                                             $message = "Success, last name changed to $NewValue.";
                                             $_SESSION['lname'] = $NewValue;
                                         } else {
                                             $message = "Error updating record: " . $conn->error;
                                         }
                                    }
                              }
                              else if($ItemToChange == "change_email"){ //email
                                    if (!filter_var($NewValue, FILTER_VALIDATE_EMAIL)) {
                                          $message = "Error: Invalid email address.";
                                  }
                                  else{
                                        $changed_value = "UPDATE useraccounts SET email='$NewValue' WHERE userID='$userID'";
                                        if ($conn->query($changed_value) === TRUE) {
                                           $message = "Success, email changed to $NewValue.";
                                           $_SESSION['email'] = $NewValue;
                                       } else {
                                           $message = "Error updating record: " . $conn->error;
                                       }
                                  }
                              }
                              else {      //change pin
                                    if (!preg_match("/^[0-9]*$/",$NewValue)) {
                                     $message = "Error: Pin may only consist of numbers.";
                                    }
                                    else{
                                          $changed_value = "UPDATE useraccounts SET pin='$NewValue' WHERE userID='$userID'";
                                          if ($conn->query($changed_value) === TRUE) {
                                           $message = "Success, pin changed.";
                                           } else {
                                                  $message = "Error updating record: " . $conn->error;
                                          }
                                    }
                              }

                        }

                }
                else {
                      $message = "Error: Incorrect pin entered.";
                }
      }

      if(isset($_POST['DeleteAccount'])){ //if delete account is entered.
            $pin_verify2 = $_POST["pin_verify2"];
            $verify2 = "SELECT pin FROM useraccounts WHERE userID='$userID'";
            $result_verify2 = $conn->query($verify2);

                $verify_row2 = $result_verify2->fetch_assoc();
                $userPin2 = $verify_row2["pin"];

                if ($userPin2 == $pin_verify2){ //if pin is correct, remove their column from the useraccounts database and log them out
                      $delete = "DELETE FROM useraccounts WHERE userID='$userID' ";
                      //$result=mysql_query($sql)
                              if ($conn->query($delete) === TRUE) {     //deletion successful
                                      session_start();
                                      session_unset();
                                      session_destroy();
                                      header("Location: /homepage.php");
                              } else {
                                echo "Error deleting record: " . $conn->error;
                              }
                }
                else {
                      $message2 = "Error: Incorrect pin. Account has not been deleted.";
                }
          }

  $conn->close();
?>

<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Account Information</title>
    <link rel="stylesheet" href="deposit.css">
  </head>

  <body>  <!This is the title page>
      <div class = "row">
          <div id = "grad1", class = "header"><h1>
           <p class = "custom1"> Corona Credit</p>
         </h1></div>
          <div id = ""
      		<div class="topnav">
      			<a href="logout.php" style="float: right;"> Sign Out</a>
      			<a href="test_userpage.php" style="float: left;"> Return to Home</a>
                        <a href= "customAccounts.php" style="float: left;"> View Accounts</a>
                        <a href= "addAccount.php" style="float: left;"> Add Accounts</a>
                        <a href= "deleteAccount.php" style="float: left;"> Delete Accounts</a>
                        <a href= "transfer.php" style="float: left;">Transfer Cash</a>
                        <a href= "deposit.php" style="float: left;">Deposit Cash</a>
      				</div>
      			</div>

            <div class = "leftcolumn">
                  <div class = "column">
                        <body>
              <h2> Account Information</h2>
                  <p><?php echo("<b>Name:</b> " .$_SESSION['fname'] . " " .$_SESSION['lname']); ?></p>
                  <p><?php echo("<b>Username:</b> " .$_SESSION['username']); ?></p>
                  <p><?php echo("<b>User ID Number:</b> " .$_SESSION['userID']); ?></p>
                  <p><?php echo("<b>Email:</b> " .$_SESSION['email']); ?></p>
                        </body>
                  <p></p>
                  <h2>Delete Account</h2>
                  <?php
                        echo "<p style=\"color: red\">";
                        echo $message2;
                        echo "</p>";
                  ?>
                  <p>Warning! Entering this option will delete your user account permanently.</p>
                  <form action="" method="post" enctype="multipart/form-data">
                        <input style= "width: 20%;" type="password" name = "pin_verify2" placeholder = "Pin" required>
                        <button type = "submit" name = "DeleteAccount">Delete User Account</button>
                  </form>
                  </div>
            </div>

            <div class = "rightcolumn">
                  <div class = "column">
                        <body>
                        <h2>Edit Information:</h2>
                        <?php
                              echo "<p style=\"color: red\">";
                              echo $message;
                              echo "</p>";
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                              <select style= "width: 80%;" name="toChange">
                              <option value="">Select item to edit</option>
                              <option value="change_username">Username</option>
                              <option value="change_fname">First Name</option>
                              <option value="change_lname">Last Name</option>
                              <option value="change_email">Email</option>
                              <option value="change_pin">Pin</option>
                        </select>
                        <input style= "width: 80%;" type="password" name = "pin_verify" placeholder = "Pin" required>
                        <input style= "width: 80%;" type="text" name = "new_value" placeholder = "Change to..." required>
                        <p><button type = "submit" name = "SubmitButton"> Edit </button></p>
                        </form>
                        </body>
                  </div>
            </div>

  </body>
</html>
