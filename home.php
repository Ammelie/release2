<?php

  echo '
    <div class="wrapper">
      <div class="dark-overlay" id="dark-overlay">
        <div class="game-window" id="game-window">
          <div class="game-title bold-header"><h2>Hangman</h2></div>
          <div class="gallows">
            <h1 class="lives" id="lives"></h1>
            <h2>lives left</h2>
          </div>
          <div class="word" id="word"></div>
          <div class="wrong-guesses" id="wrong-guesses"></div>
        </div>
      </div>
      
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
        <div class="addthis_inline_share_toolbox"></div>
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
  ';

?>
