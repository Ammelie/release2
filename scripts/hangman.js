var secret = "GOATUNHEIM";
var input = "";
var pos = 0;


//Saves each key pressed in a string, and compares it to the character in the corresponding position in "secret".
//If they are the same, move to the next position, otherwise empty the string and reset position.
$(document).ready(function() {
  $(window).keyup(function(e){
    var key = String.fromCharCode(e.which);
    key.toUpperCase();

    if (key == secret.charAt(pos)) {
      input += key;
      console.log(input);
      pos++;
    } else {
      input = "";
      pos = 0;
    }

    isSecret();
  });
});


//When password is correct, reset things and run the game!
function isSecret() {
  if (input == secret) {
    input = "";
    pos = 0;
    hangman();
  }
}

function hangman() {
  $("#dark-overlay").css("display", "flex");
  $("#game-window").css("display", "flex");

  $("#dark-overlay").click(function() {
    $("#dark-overlay").css("display", "none");
    $("#game-window").css("display", "none");
  });
}
