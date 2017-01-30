<?php
session_start();
include('config.php');

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
        </tr>
  ";

  get_messages($db);

  echo "
    </div>
  ";



  function get_messages($db) {
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
        </tr>
      ";
    }
  }
?>
