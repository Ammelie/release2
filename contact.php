<?php
  include 'config.php';
?>

<div class='contact-wrapper'>
  <header class='contact-header bold-header'>
    <h1>Get in touch</h1>
  </header>

  <div class='contact-content'>
    <form action='' method='post'>

<?php
  # Insert message into database and give user a nice thank you message
  if (isset($_POST['send-msg'])) {
    $date = date("Y-m-d H:i:s");

    # Run a cleaning function on all fields posted
    foreach ($_POST as $key => $value) {
      $$key = clean($db, $value);
    }

    $query = "
    INSERT INTO messages (date, name, email, phone, message, captain) VALUES
    ('".$date."', '".$name."', '".$email."', '".$phone."', '".$message."', '".$captain."')
    ";

    mysqli_query($db, $query);

    echo "<div class='thank-you'><h2>Thank you for your message!</h2></div>";
  }


  # Trims input and escapes it
  function clean($db, $value) {
    $cleanVal = trim($value);
    $cleanVal = mysqli_real_escape_string($db, $value);
    return $cleanVal;
  }
?>


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
      <label for='captain'>Favorite captain</label>
      <select name='captain'>
        <option value='James T. Kirk'>James T. Kirk</option>
        <option value='Jean-Luc Picard'>Jean-Luc Picard</option>
        <option value='Kathryn Janeway'>Kathryn Janeway</option>
        <option value='Han Solo'>Han Solo</option>
        <option value='Grand Moff Tarkin'>Grand Moff Tarkin</option>
        <option value='William Adama'>William Adama</option>
        <option value='Malcolm Reynolds'>Malcolm Reynolds</option>
        <option value='Zaphod Beeblebrox'>Zaphod Beeblebrox</option>
        <option value='Turanga Leela'>Turanga Leela</option>
        <option value='The Doctor (any)'>The Doctor (any)</option>
      </select>
      <br />
      <input type='submit' name='send-msg' class='btn' value='Send message'>
    </form>
  </div>
</div>
