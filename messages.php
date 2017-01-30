<?php
  session_start();
  include('config.php');

  if(isset($_SESSION['admin'])) {
    echo "
      <div class='messages-header-wrapper'>
        <header class='messages-header bold-header'>
          <h1>Messages</h1>
        </header>
      </div>

      <div class='messages-content-wrapper'>
        <table>
          <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Captain</th>
          </tr>
    ";

    # Get all messages and display them in table rows
    $query = 'SELECT * FROM messages ORDER BY id DESC';
    $result = mysqli_query($db, $query);

    while ($message = mysqli_fetch_assoc($result)) {
      echo "
        <tr>
          <td>{$message['date']}</td>
          <td>{$message['name']}</td>
          <td>{$message['email']}</td>
          <td>{$message['phone']}</td>
          <td>{$message['message']}</td>
          <td>{$message['captain']}</td>
        </tr>
      ";
    }

    echo "</div>";
  } else {
    header("Location: http://www.ammelieneth.se");
  }

?>
