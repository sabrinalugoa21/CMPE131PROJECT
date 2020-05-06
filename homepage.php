<html lang="en">
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SJSU Bank</title>
    <link rel="stylesheet" href="homepage.css">
  </head>

  <body><!This is the title page>
    <!MENU BAR>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="">Checking Account</a>
      <a href="">Savings Account</a>
      <a href="">Investing</a>
      <a href="">Better Money Habits</a>
    </div>

    <div id="main">

      <div class="header">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
        <!TOP BAR>
        <a href="homepage.php", class="logo", style="color: #FFFFE0">SJSU Bank</a>
      </div>

      <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="atmlogin.php">Find an ATM</a>
        <div class="header-right">
          <a class="active" href="login.php">Sign In</a>
        </div>
      </div>
      <br>

      <!Register>
      <div class = "section">
        <div class = "row">
          <div class="leftcolumn">
            <img src="register.jpg", style="border-radius: 5%">
          </div>

          <div class="rightcolumn">
            <h1>Click below to register for an account</h1>
            <!-- <p>Put some other stuff here and add a button</p> -->
            <br>
            <a href = "register.php", button class="button button1">Register</a>
          </div>
        </div>
      </div>

      <br> -->

      <div class = "section">
        <div class="row">
          <div class="leftcolumn">
            <h1>Click below to sign in to your account</h1>
            <!-- <p>Put some other stuff here and add a button</p> -->
            <br>
            <a href = "", button class="button button1">This can go to something</a>
          </div>

          <div class="leftcolumn">
            <img src="money.jpg" alt="Image 2" style="border-radius:50%">
          </div>
        </div>
      </div>

       <!Testemonials>
      <br>
      <div class = "section">
        <br>
        <div class="slideshow-container">
          <div class="mySlides">
            <q>I love you the more in that I believe you had liked me for my own sake and for nothing else</q>
            <p class="author">- John Keats</p>
          </div>

          <div class="mySlides">
            <q>But man is not made for defeat. A man can be destroyed but not defeated.</q>
            <p class="author">- Ernest Hemingway</p>
          </div>

          <div class="mySlides">
            <q>I have not failed. I've just found 10,000 ways that won't work.</q>
            <p class="author">- Thomas A. Edison</p>
          </div>

          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>

        </div>

        <div class="dot-container">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>

         <script>
          var slideIndex = 1;
          showSlides(slideIndex);

          function plusSlides(n) {
            showSlides(slideIndex += n);
          }

          function currentSlide(n) {
            showSlides(slideIndex = n);
          }

          function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
          }
        </script>



        <br>
      </div>

      <br>
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
