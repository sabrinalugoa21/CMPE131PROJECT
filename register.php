<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>

  <link rel="stylesheet" href="registerStyle.css">
  </head>
  <body>
    <h1>Sign up for an Account</h1>


<div id= "form">
    <form action = "register-account.php" method="post">
        <div class = "form-group">
          <label for ="First name"> First name:</label>
          <input name = "fname" type = "text">
        </div>
        <div class = "form-group">
          <label for = "Last name"> Last name: </label>
          <input name = "lname" type = "text">
      </div>
      <div class = "form-group">
        <label for = "Username"> Username: </label>
        <input name = "username" type = "text">
      <div class = "form-group">
        <label for ="Password">Password: </label>
        <input type ="password" name="password">
      </div>
      <div class = "form-group">
        <label for = "Email"> Email: </label>
        <input name = "email" type = "text">
      </div>
        <input type = "submit" name = "submit" id = "submit">
   </form>
</div>

  </body>
</html>
