<?php
session_start();

if(isset($_SESSION['admin'])) {
  echo "
    <div class='admin-wrapper'>
      <form action='' method='post'>
        <input class='btn' type='submit' name='logout' value='Log out'>
      </form>
    <div class='admin-wrapper'>
  ";
} else {
  echo "
    <div class='admin-wrapper'>
      <form action='' method='post'>
        <label for='username'>Username</label>
        <input type='text' name='username' required>
        <br />
        <label for='number'>Password</label>
        <input type='password' name='password' required>
        <br />
        <input class='btn' type='submit' name='login' value='Log in'>
      </form>
    </div>
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
    echo 'Wrong username or password.';
  }

}

if (isset($_POST['logout'])) {
  unset($_SESSION['admin']);
  header("Location: http://www.ammelieneth.se");
}

?>
