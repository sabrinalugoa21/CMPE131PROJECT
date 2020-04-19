<html lang="en">
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bank Name</title>
    <link rel="stylesheet" href="homepage.css">
  </head>

  <body>  <!This is the title page>

<!MENU BAR>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="about.html">About</a>
    <a href="Register.php">Register</a>
    <a href="login.php">Sign In</a>
    <a href="contact.html">Contact</a>
  </div>

  <div id="main">
    <div class="header">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
    <!TOP BAR>

    <a href="homepage.php" class="logo">Bank Name</a>
    <div class="header-right">
      <a class="active" href="#home">Sign In</a>
    </div>
  </div>

  <div style="padding-left:20px">
    <!SIGN IN>
    <!REGISTER>
        <h2></h2>
        <div class = "row">
          <div class = "leftcolumn">
            <div class= "account">
              <h1><p> Register Today!</p></h1>
                <div class="topnav2">
                  <a href="register.php" style="float: left;">Register</a>
                </div>
            </div>
          </div>

          <div class = "rightcolumn">
            <div class = "account">
              <h1> Sign In</h1>
              <div class="topnav2">
                <a href="register.php" style="float: left;"> Let's get going!</a>
              </div>
            </div>
          </div>
        </div>

        <!This is for bottom of homepage>
        <h1></h1>
        <div class="row:after">
        <div class="column">
        <div class="container">
          <img src="cool.jpg" alt="Avatar" class="image">
          <div class="overlay">
            <div class="text">Take Control of your finances</div>
          </div>
        </div>
        </div>

        <div class="column">
        <div class="container">
          <img src="hover.jpg" alt="Avatar1" class="image">
          <div class="overlay">
            <div class="text">Take Control of your finances</div>
          </div>
        </div>
      </div>

      <div class="column">
      <div class="container">
        <img src="thing.jpeg" alt="Avatar2" class="image">
        <div class="overlay">
          <div class="text">Take Control of your finances</div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }
  </script>

  </body>
</html>
