var secret = "GOATUNHEIM";
var input = "";
var pos = 0;
var wrongGuesses;
var placeholder;
var isGameRunning = false;



//If game isn't already running, check user input against the easter egg password. If user types a wrong letter, start over from the beginning
$(document).ready(function() {
  $(window).keyup(function(e) {
    if (isGameRunning === false) {
      var key = String.fromCharCode(e.which);
      key.toUpperCase();

      if (key == secret.charAt(pos)) {
        input += key;
        pos++;
        checkSecret();
      } else {
        input = "";
        pos = 0;
      }
    }
  });
});



//When password is correct, reset things and run the game! If you're not there yet, do nothing.
function checkSecret() {
  if (input == secret) {
    input = "";
    pos = 0;

    showGame();
    hangman();
  }
}


//Toggles game window
function showGame() {
  wrongGuesses = "";
  placeholder = "";
  $("#dark-overlay").css("display", "flex");
  $("#game-window").css("display", "flex");
  isGameRunning = true;

  $("#dark-overlay").click(function() {
    $("#dark-overlay").css("display", "none");
    $("#game-window").css("display", "none");
    isGameRunning = false;
  });
}



function hangman() {
  var solutions = ["SUPERCALIFRAGILISTICEXPIALIDOCIOUS", "SESQUIPEDALIANISM", "HIPPOPOTOMONSTROSESQUIPEDALIOPHOBIA", "BARDOLATRY", "BLATHERSKITE"];
  var solution = solutions[Math.floor(Math.random() * solutions.length)];


  //Create a placeholder consisting of interrogation marks
  for (i = 0; i < solution.length; i++) {
    placeholder += "?";
  }

  $("#word").text(placeholder);


  //Compare user input with the solution and replace interrogation marks where applicable/display wrong letters somewhere else.
  $(window).keyup(function(e) {
    if (isGameRunning) {
      var guess = String.fromCharCode(e.which);
      guess.toUpperCase();

      if (solution.includes(guess)) {
        for (i = 0; i < solution.length; i++) {
          if (guess == solution.charAt(i)) {
            placeholder = placeholder.substr(0, i) + guess + placeholder.substr(i+1);
            $("#word").text(placeholder);
          }
        }

        //Check if user won by guessing the entire word
        if (placeholder == solution) {
          alert("You won!");
          isGameRunning = false;
          $("#word").text("");
          $("#wrong-guesses").text("");
        }

      } else {
        $("#wrong-guesses").append(guess);
      }
    }
  });
}
