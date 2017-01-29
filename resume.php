<?php
  session_start();
  include('config.php');

  # Do things if form is posted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    # Run a cleaning function on all fields posted
    foreach ($_POST as $key => $value) {
      $$key = clean($db, $value);
    }

    # Make a query depending on which form is posted
    if (isset($_POST['add-job'])) {
      $query = "
      INSERT INTO jobs (company, position, location, period, description, responsibilities) VALUES
      ('".$company."', '".$position."', '".$location."', '".$period."', '".$description."', '".$responsibilities."')
      ";
    } elseif (isset($_POST['add-education'])) {
      $query = "
      INSERT INTO educations (school, program, location, period, description) VALUES
      ('".$school."', '".$program."', '".$location."', '".$period."', '".$description."')
      ";
    } elseif (isset($_POST['update-job'])) {
      $query ="
      UPDATE jobs
      SET company='".$company."', position='".$position."', location='".$location."', period='".$period."', description='".$description."', responsibilities='".$responsibilities."'
      WHERE id ='".$id."'
      ";
    } elseif (isset($_POST['update-education'])) {
      $query ="
      UPDATE educations
      SET school='".$school."', program='".$program."', location='".$location."', period='".$period."', description='".$description."'
      WHERE id ='".$id."'
      ";
    } elseif (isset($_POST['remove-job'])) {
      $query ="
      DELETE FROM jobs
      WHERE id ='".$id."'
      ";
    } elseif (isset($_POST['remove-education'])) {
      $query ="
      DELETE FROM educations
      WHERE id ='".$id."'
      ";
    }

    mysqli_query($db, $query);
    header("Location: http://www.ammelieneth.se/?page=resume.php");
  }


  echo "
    <div class='resume-wrapper'>
      <header class='resume-header bold-header'>
        <h1>Resume</h1>
      </header>

      <div class='resume-content'>
        <div class='narrow'>
          <section>
            <header><h2>Work Experience</h2></header>
            <br />
  ";


  # Form for admin, to add jobs
  if (isset($_SESSION['admin'])) {
    echo "
      <div class='expand'>
        <h3>Add job</h3>
        <form class='resume-form' action='' method='post'>
          <label for='company'>Company</label>
          <input type='text' name='company' required>
          <br />
          <label for='position'>Position</label>
          <input type='text' name='position' required>
          <br />
          <label for='location'>Location</label>
          <input type='text' name='location' required>
          <br />
          <label for='period'>Period</label>
          <input type='text' name='period' required>
          <br />
          <label for='description' class='align-top'>Description</label>
          <textarea name='description' required></textarea>
          <br />
          <label for='responsibilities' class='align-top'>Responsibilities</label>
          <textarea name='responsibilities' required></textarea>
          <br />
          <input type='submit' name='add-job' class='btn' value='Add job'>
        </form>
      </div>
    ";
  }

  get_jobs($db);

  echo "
    </section>
    <br /><br />

    <section>
      <header><h2>Education</h2></header>
      <br />
  ";


  # Form for admin, to add educations
  if (isset($_SESSION['admin'])) {
    echo "
      <div class='expand'>
        <h3>Add education</h3>
        <form class='resume-form' action='' method='post'>
          <label for='school'>School</label>
          <input type='text' name='school' required>
          <br />
          <label for='program'>Program</label>
          <input type='text' name='program' required>
          <br />
          <label for='location'>Location</label>
          <input type='text' name='location' required>
          <br />
          <label for='period'>Period</label>
          <input type='text' name='period' required>
          <br />
          <label for='description' class='align-top'>Description</label>
          <textarea name='description' required></textarea>
          <br />
          <input type='submit' name='add-education' class='btn' value='Add education'>
        </form>
      </div>
    ";
  }

  get_educations($db);

  echo "
          </section>
        </div>
      </div>
    </div>
  ";


  # Get jobs from database and display on page
  function get_jobs($db) {
    $query = 'SELECT * FROM jobs ORDER BY id DESC';
    $result = mysqli_query($db, $query);

    # Show entries as forms if user is admin, so they can edit and remove entries
    if (isset($_SESSION['admin'])) {
      while ($entry = mysqli_fetch_assoc($result)) {
        echo "
          <div class='expand'>
            <h3>{$entry['company']}</h3>
            <form class='resume-form' action='' method='post'>
              <input type='hidden' name='id' value='{$entry['id']}' required>
              <label for='company'>Company</label>
              <input type='text' name='company' value='{$entry['company']}' required>
              <br />
              <label for='position'>Position</label>
              <input type='text' name='position' value='{$entry['position']}' required>
              <br />
              <label for='location'>Location</label>
              <input type='text' name='location' value='{$entry['location']}' required>
              <br />
              <label for='period'>Period</label>
              <input type='text' name='period' value='{$entry['period']}' required>
              <br />
              <label for='description' class='align-top'>Description</label>
              <textarea name='description' required>{$entry['description']}</textarea>
              <br />
              <label for='responsibilities' class='align-top'>Responsibilities</label>
              <textarea name='responsibilities' required>{$entry['responsibilities']}</textarea>
              <br />
              <input type='submit' name='update-job' class='btn' value='Update'>
              <input type='submit' name='remove-job' class='btn' value='Remove'>
            </form>
          </div>
        ";
      }

    # For normal users, display entries
    } else {
      while ($entry = mysqli_fetch_assoc($result)) {
        echo "
          <article class='expand'>
            <header>
              <div>
                <h3>{$entry['company']}</h3>
                <h3>{$entry['position']}</h3>
              </div>
              <div class='location'>
                <h3>{$entry['location']}</h3>
                <h3>{$entry['period']}</h3>
              </div>
            </header>
            <div class='description'>
              <p>
                {$entry['description']}
              </p>
              <br />
              <p>Responsibilities included:</p>
              <ul>
                {$entry['responsibilities']}
              </ul>
            </div>
          </article>
          <br />
        ";
      }
    }
  }


  # Get educations from database and display on page
  function get_educations($db) {
    $query = 'SELECT * FROM educations ORDER BY id DESC';
    $result = mysqli_query($db, $query);

    # Show entries as forms if user is admin, so they can edit and remove entries
    if (isset($_SESSION['admin'])) {
      while ($entry = mysqli_fetch_assoc($result)) {
        echo "
        <div class='expand'>
          <h3>{$entry['school']}</h3>
          <form class='resume-form' action='' method='post'>
            <input type='hidden' name='id' value='{$entry['id']}' required>
            <label for='school'>School</label>
            <input type='text' name='school' value='{$entry['school']}' required>
            <br />
            <label for='program'>Program</label>
            <input type='text' name='program' value='{$entry['program']}' required>
            <br />
            <label for='location'>Location</label>
            <input type='text' name='location' value='{$entry['location']}' required>
            <br />
            <label for='period'>Period</label>
            <input type='text' name='period' value='{$entry['period']}' required>
            <br />
            <label for='description' class='align-top'>Description</label>
            <textarea name='description' required>{$entry['description']}</textarea>
            <br />
            <input type='submit' name='update-education' class='btn' value='Update'>
            <input type='submit' name='remove-education' class='btn' value='Remove'>
          </form>
        </div>
        ";
      }

    # For normal users, display entries
    } else {
      while ($entry = mysqli_fetch_assoc($result)) {
        echo "
          <article class='expand'>
            <header>
              <div>
                <h3>{$entry['school']}</h3>
                <h3>{$entry['program']}</h3>
              </div>
              <div class='location'>
                <h3>{$entry['location']}</h3>
                <h3>{$entry['period']}</h3>
              </div>
            </header>
            <div class='description'>
              <p>
                {$entry['description']}
              </p>
            </div>
          </article>
          <br />
        ";
      }
    }
  }


  # Trim input and escape it
  function clean($db, $value) {
    $cleanVal = trim($value);
    $cleanVal = mysqli_real_escape_string($db, $value);
    return $cleanVal;
  }
?>
