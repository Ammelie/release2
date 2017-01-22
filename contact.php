<?php

  echo '
    <div class="contact-wrapper">
      <header class="contact-header bold-header">
        <h1>Get in touch</h1>
      </header>

      <div class="contact-content">
        <form>
          <label for="name">Name</label>
          <input type="text" name="name" required></input>
          <br />
          <label for="email">Email</label>
          <input type="email" name="email" required></input>
          <br />
          <label for="number">Phone number</label>
          <input type="tel" name="number" required></input>
          <br />
          <label for="message" class="align-top">Message</label>
          <textarea name="message" required></textarea>
          <br />
          <input type="submit" name="send-msg" class="btn"></input>
        </form>
      </div>
    </div>
  ';

?>
