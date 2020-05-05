<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>SJSU Bank</title>
    <link rel="stylesheet" href="test_userpage.css">
  </head>

  <body>  <!This is the title page>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="">Checking Account</a>
      <a href="">Savings Account</a>
      <a href="">Transaction History</a>
      <a href="">Profile</a>
    </div>

    <div id="main">
      <!Header>
      <div class="header">
        <span style="float:left",style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
        <h1 class="logo">SJSU Bank</h1>
      </div>

      <!TOP BAR>
      <div class="topnav">
        <!This is the sign up button, will add a connection later>
      	<a href="logout.php" style="float: right;"> Sign Out</a>
        <!Lauren: I don't know if the main menu button needs a dropdown menu with those links rn>
        <!This is the dropdown button with options, they connect to nowhere rn>
      	<a href="acctInfo.php" style="float: left;"> Account Information</a>
      </div>

      <br>
      <div class = "row"><!Right Column>
        <div class = "rightcolumn">
          <div class= "account">
            <p> add a photo or a quote here </p>
          </div>
        </div>

        <div class = "leftcolumn"><!Left Column>
          <div class = "account">
            <h1>Accounts</h1>
            <div class="topnav2">
              <!Deleted link to savings because ALL accounts are displayed on the link below>

              <a href="customAccounts.php" style="float: left;">View Accounts</a>

              <a href="deleteAccount.php" style="float: right;">Delete</a>
              <a href="addAccount.php" style="float: right;">Add</a>
            </div>
          </div>

          <div class = "account">
            <h1>Transactions</h1>
            <div class="topnav2">
              <a href="deposit.php" style="float: left">Deposit</a>
              <a href="transfer.php" style="float: left;">Transfer</a>
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
