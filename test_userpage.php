<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Bank Name</title>
    <link rel="stylesheet" href="userpage.css">
  </head>

  <body>  <!This is the title page>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="">Checking Account</a>
      <a href="">Savivngs Account</a>
      <a href="">Transaction His</a>
      <a href="">Profile</a>
    </div>

    <div id="main">
      <!Header>
      <div class="header">
        <span style="float:left",style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
        <h1 class="logo">Bank Name</h1>
      </div>

      <!TOP BAR>
      <div class="topnav">
        <!This is the sign up button, will add a connection later>
      	<a href="" style="float: right;"> Sign Out</a>
        <!Lauren: I don't know if the main menu button needs a dropdown menu with those links rn>
        <!This is the dropdown button with options, they connect to nowhere rn>
      	<a href="" style="float: left;"> Account Settings</a>
      </div>

      <br>
      <div class = "row"><!Right Column>
        <div class = "rightcolumn">
          <div class= "account">
            <p> Here we will put a bunch of links, one per line, and they navigate to some account settings like changing pin or password or something? </p>
            <p>Unsure at this point, but recommend putting something in a column here</p>
          </div>
        </div>

        <div class = "leftcolumn"><!Left Column>
          <div class = "account">
            <h1>Accounts</h1>
            <div class="topnav2">
              <a href="" style="float: left;">Checkings</a>
              <a href="" style="float: left;">Savings</a>
              <a href="" style="float: right;">Manage</a>
            </div>
          </div>

          <div class = "account">
            <h1>Transactions</h1>
            <div class="topnav2">
              <a href="" style="float: left">Deposit</a>
              <a href="" style="float: left;">Withdraw</a>
              <a href="" style="float: left;">Transfer</a>
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
