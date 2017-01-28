<?php
session_start();

if(isset($_SESSION['admin'])) {
  echo "
    <form action='' method='post'>
      <input type='submit' name='logout' value='Log out'>
    </form>
  ";
} else {
  echo "
    <form action='' method='post'>
      <label for='username'>Username</label>
      <input type='text' name='username' required>
      <br />
      <label for='number'>Password</label>
      <input type='password' name='password' required>
      <br />
      <input type='submit' name='login' value='Log in'>
    </form>
  ";
}


if (isset($_POST['username']) and isset($_POST['password'])) {
  include 'config.php';

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = sha1(mysqli_real_escape_string($db, ($_POST['password'])));

  $query = "
    SELECT *
    FROM users
    WHERE username = '".$username."'
    AND password = '".$password."'
  ";

  $result = mysqli_query($db, $query);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION['admin'] = true;
    header("Location: http://www.ammelieneth.se");

  } else {
    echo 'Något gick fel.';
  }

}

if (isset($_POST['logout'])) {
  $_SESSION['admin'] = false;
  header("Location: http://www.ammelieneth.se");
}

?>
