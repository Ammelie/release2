var secret = "GOATUNHEIM";
var input = "";
var pos = 0;
var gameRunning = false;



//If game isn't already running, check user input against the easter egg password. If user types a wrong letter, start over from the beginning.
$(document).ready(function() {
  console.log(secret);


  $(window).keyup(function(e) {
    if (gameRunning === false) {
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



//Toggles game window.
function showGame() {
  $("#dark-overlay").css("display", "flex");
  $("#game-window").css("display", "flex");
  gameRunning = true;

  $("#dark-overlay").click(function() {
    $("#dark-overlay").css("display", "none");
    $("#game-window").css("display", "none");
    reset();
  });
}



//Game logic
function hangman() {
  var wrong = "";
  var lives = 5;
  var solution = makeSolution();
  var placeholder = makePlaceholder(solution);

  $("#lives").text(lives);

  $(window).keyup(function(e) {
    if (gameRunning) {
      var guess = String.fromCharCode(e.which);
      guess.toUpperCase();

      if (solution.includes(guess)) {
        placeholder = updatePlaceholder(guess, solution, placeholder);
        isGameOver(solution, placeholder, lives);
      } else if (!(wrong.includes(guess))) {
        wrong = updateGuesses(wrong, guess);
        lives = updateLives(lives);
        isGameOver(solution, placeholder, lives);
      }
    }
  });
}



//Resets some things when game's closed
function reset() {
  gameRunning = false;
  $("#word").text("");
  $("#wrong-guesses").text("");
}



//Selects a word from an array, so the game can be played with several solutions.
function makeSolution () {
  var solutions = ["SUPERCALIFRAGILISTICEXPIALIDOCIOUS", "SESQUIPEDALIANISM", "HIPPOPOTOMONSTROSESQUIPEDALIOPHOBIA", "BARDOLATRY", "BLATHERSKITE"];
  var solution = solutions[Math.floor(Math.random() * solutions.length)];

  return solution;
}



//Create a placeholder so player can see how many letters there are in the solution.
function makePlaceholder(solution) {
  var placeholder = "";

  for (i = 0; i < solution.length; i++) {
    placeholder += "?";
  }

  $("#word").text(placeholder);

  return placeholder;
}



//Updates the placeholder when player guesses a letter that's in the word.
function updatePlaceholder(guess, solution, placeholder) {
  for (i = 0; i < solution.length; i++) {
    if (guess == solution.charAt(i)) {
      placeholder = placeholder.substr(0, i) + guess + placeholder.substr(i+1);
      $("#word").text(placeholder);
    }
  }

  return placeholder;
}



//Updates the list of wrong guesses when player makes a wrong guess.
function updateGuesses(wrong, guess) {
  wrong += guess;
  $("#wrong-guesses").text(wrong);

  return wrong;
}



function updateLives(lives) {
  lives -= 1;
  $("#lives").text(lives);
  
  return lives;
}


//Check if player won or lost
function isGameOver(solution, placeholder, lives) {
  if (placeholder == solution) {
    alert("You won!");
    reset();
  } else if (lives <= 0) {
    alert("You lost!");
    reset();
  }
}
