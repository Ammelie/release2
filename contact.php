<?php

  include 'config.php';

  echo "
    <div class='contact-wrapper'>
      <header class='contact-header bold-header'>
        <h1>Get in touch</h1>
      </header>

      <div class='contact-content'>
        <form action='' method='post'>
  ";


  if (isset($_POST['send-msg'])) {
    $date = date("Y-m-d H:i:s");

    # Run a cleaning function on all fields posted
    foreach ($_POST as $key => $value) {
      $$key = clean($db, $value);
    }

    $query = "
    INSERT INTO messages (date, name, email, phone, message) VALUES
    ('".$date."', '".$name."', '".$email."', '".$phone."', '".$message."')
    ";

    mysqli_query($db, $query);

    echo "<h2 class'thank-you'>Thank you for your message!</h2>";
  }


  echo "
        <label for='name'>Name</label>
        <input type='text' name='name' required>
        <br />
        <label for='email'>Email</label>
        <input type='email' name='email' required>
        <br />
        <label for='number'>Phone number</label>
        <input type='tel' name='phone'>
        <br />
        <label for='message' class='align-top'>Message</label>
        <textarea name='message' required></textarea>
        <br />
        <input type='submit' name='send-msg' class='btn' value='Send message'>
      </form>
    </div>
  </div>
";



  # Trims input and escapes it
  function clean($db, $value) {
    $cleanVal = trim($value);
    $cleanVal = mysqli_real_escape_string($db, $value);
    return $cleanVal;
  }

?>
