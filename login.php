<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <link rel="stylesheet" href="registerStyle.css">
	<!At this point in time, I will be using the registerStyle for the login page as well>
  </head>
  <body>

  <div id= "form">
    <form action = "login.php" method="post">
	<! Login currently set to use username and password for login, may want to include email option>
      <div class = "form-group">
        <label for = "Username"> Username: </label>
        <input name = "Username" id = "Username">
      <div class = "form-group">
        <label for ="Password">Password: </label>
        <input name ="Password" id = "Password">
      </div>
        <input type = "submit" name = "submit" id = "submit">
	</form>
  </div>

  <?php
    session_start();

    $errorRet = "";
    if(isset($_POST["loginuser"])){
        $username = $_POST["loginuser"];
    } else {
        $username = "";
    }

    if(isset($_POST["loginpass"])){
        $password = $_POST["loginpass"];
    } else {
        $password = "";
    }

    $password = hash('password', $password);

    $conn = new mysqli("localhost", "bankname", "frankbutt!", "bankname");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM Users;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	if(strtolower($row["USER_NAME"]) == strtolower($username)) {
	    	    if($row["USER_PASS"] == $password) {
    	            $_SESSION["USER_NAME"] = $row["USER_NAME"];
    	            $_SESSION["SECURITY_LVL"] = $row["SECURITY_LVL"];
    	            $_SESSION["USER_ID"] = $row["USER_ID"];
    	            $_SESSION["PATRON_FIRST_NAME"] = $row["PATRON_FIRST_NAME"];
    	            $_SESSION["PATRON_LAST_NAME"] = $row["PATRON_LAST_NAME"];
    	            $_SESSION["USER_PIN"] = $row["USER_PIN"];
    	            header('Location: /landing/');
    	            exit;
    	        } else {
    	            $errorRet = "2";
    	            break;
    	        }
	        } else {
	            $errorRet = "1";
	        }
	    }
	} else {
	    $errorRet = "3";
	}

    header('Location: /login/?return='.$errorRet);
    exit;

    $conn->close();
?>
