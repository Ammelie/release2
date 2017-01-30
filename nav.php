<?php
  session_start();
?>


<nav>
  <div class='menu-item'><a href='?page=home.php'>Home</a></div>
  <div class='menu-item'><a href='?page=about.php'>About</a></div>
  <div class='menu-item'><a href='?page=resume.php'>Resume</a></div>
  <div class='menu-item'><a href='?page=portfolio.php'>Portfolio</a></div>


<?php
  # Display different menu items depending on whether user is admin
  if(isset($_SESSION['admin'])) {
    echo "
      <div class='menu-item'><a href='?page=messages.php'>Messages</a></div>
      <div class='menu-item'><a href='?page=admin.php'>Log out</a></div>
    ";
  } else {
    echo "
      <div class='menu-item'><a href='?page=contact.php'>Contact</a></div>
    ";
  }
?>


</nav>
