//Set some variables
var secret = "GOATUNHEIM";
var input = "";
var pos = 0;


$(document).ready(function() {
  console.log(secret);

    //Take user input and format it
  $(window).keyup(function(e) {
    var key = String.fromCharCode(e.which);
    key.toUpperCase();

    //Check user input against the easter egg password. If user types a wrong letter, start over from the beginning.
    if (key == secret.charAt(pos)) {
      input += key;
      pos++;
      checkSecret();
    } else {
      input = "";
      pos = 0;
    }
  });
});



//When password is correct, reset things and ropen the game! If you're not there yet, do nothing.
function checkSecret() {
  if (input == secret) {
    input = "";
    pos = 0;

    window.open('http://www.ammelieneth.se/?page=hangman.php');
  }
}
