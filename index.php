<!DOCTYPE html>
<html>
  <?php include('head.php'); ?>

  <body>
    <?php
      include('nav.php');

      if(isset($_GET['page'])) {
        switch ($_GET['page']) {
          case 'about.php':
            $page = 'about.php';
            break;
          case 'resume.php':
            $page = 'resume.php';
            break;
          case 'contact.php':
            $page = 'contact.php';
            break;
          default:
            $page = 'home.php';
            break;
        }
        include($page);
      } else {
        include('home.php');
      }

      include('footer.php');

      if(isset($_GET['page'])) {
        switch ($_GET['page']) {
          case 'home.php':
            echo '<script type="text/javascript" src="scripts/countdown.js"></script> <script type="text/javascript" src="scripts/hangman.js"></script>';
            break;
          case 'resume.php':
            echo '<script type="text/javascript" src="scripts/expand-experience.js"></script>';
            break;
          default:
            break;
        }
      } else {
        echo '<script type="text/javascript" src="scripts/countdown.js"></script> <script type="text/javascript" src="scripts/hangman.js"></script>';
      }
    ?>


    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-582c6299ab931f5a"></script>
  </body>
</html>
