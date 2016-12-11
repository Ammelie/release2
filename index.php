<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300|Share+Tech+Mono&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/countdown.js"></script>
    <script type="text/javascript" src="scripts/hangman.js"></script>
    <title>Ammelie Neth, Front End Development Student</title>
  </head>
  <body>

    <div class="dark-overlay" id="dark-overlay">
      <div class="game-window" id="game-window">
        <h1 class="bold-header">Hangman</h1>
        <div class="gallows">Hangman placeholder</div>
        <div class="word">Word placeholder</div>
        <div class="guessed-letters">Placeholder for letters that don't belong</div>
      </div>
    </div>

    <nav>
      <div class="menu-item"><a href="index.html">Home</a></div>
      <div class="menu-item"><a href="about.html">About</a></div>
      <div class="menu-item"><a href="resume.html">Resume</a></div>
    </nav>

    <div class="wrapper">
      <div class="left">
        <header class="index-header bold-header">
          <h1>Ammelie Neth</h1>
          <h2>Front End Development Student</h2>
        </header>
        <article class="content index-content">
          <h3>Welcome!</h3><br />
          <p>
            My name is Ammelie, and this page is both an ongoing assignment for my 2 year long front end development program,
            as well as a small introduction to my work. Please go on to check out my resume or
            <a href="mailto:ammelieneth@student.kyh.se">send me an email</a> to say hi!
          </p>
          <br />
          <p>
            Also, feel free to share this page:
          </p>
          <br />
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <!-- <div class="addthis_inline_share_toolbox"></div> -->
        </article>
      </div>

      <div class="right">
        <article class="countdown" id="countdown">
          <h2>Time left until internship:</h2>
          <p id="lia"></p>
          <br />
          <h2>Time left until graduation:</h2>
          <p id="graduation"></p>
        </article>
      </div>
    </div>

    <footer>
      <p>Made by Ammelie Neth, class FE16 at KYH.</p>
    </footer>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-582c6299ab931f5a"></script> -->
  </body>
</html>
