$(document).ready(function() {
  //Set some variables
  var wrong = "";
  var lives = 10;
  var solution = makeSolution();
  var placeholder = makePlaceholder(solution);

  //Show amount of lives
  $("#lives").text(lives + " lives left");

  //Take user input and format it
  $(window).keyup(function(e) {
    var guess = String.fromCharCode(e.which);
    guess.toUpperCase();

    //If user is right, update the placeholder and check if they won.
    //If user is wrong, display the wrong guess and lose a life. Check if they lost.
    if (solution.includes(guess)) {
      placeholder = updatePlaceholder(guess, solution, placeholder);
      isGameOver(solution, placeholder, lives);
    } else if (!(wrong.includes(guess))) {
      wrong = updateGuesses(wrong, guess);
      lives = updateLives(lives);
      isGameOver(solution, placeholder, lives);
    }
  });
});



//Select a word from an array, so the game can be played with several solutions.
function makeSolution () {
  var solutions = ["BULBASAUR", "IVYSAUR", "VENUSAUR", "CHARMANDER", "CHARMELEON", "CHARIZARD", "SQUIRTLE", "WARTORTLE", "BLASTOISE", "CATERPIE", "METAPOD", "BUTTERFREE", "WEEDLE", "KAKUNA", "BEEDRILL", "PIDGEY", "PIDGEOTTO", "PIDGEOT", "RATTATA", "RATICATE", "SPEAROW", "FEAROW", "EKANS", "ARBOK", "PIKACHU", "RAICHU", "RAICHU", "SANDSHREW", "SANDSLASH", "NIDORAN", "NIDORINA", "NIDOQUEEN", "NIDORINO", "NIDOKING", "CLEFAIRY", "CLEFABLE", "VULPIX", "NINETALES", "JIGGLYPUFF", "WIGGLYTUFF", "ZUBAT", "GOLBAT", "ODDISH", "GLOOM", "VILEPLUME", "PARAS", "PARASECT", "VENONAT", "VENOMOTH", "DIGLETT", "DUGTRIO", "MEOWTH", "PERSIAN", "PSYDUCK", "GOLDUCK", "MANKEY", "PRIMEAPE", "GROWLITHE", "ARCANINE", "POLIWAG", "POLIWHIRL", "POLIWRATH", "ABRA", "KADABRA", "ALAKAZAM", "MACHOP", "MACHOKE", "MACHAMP", "BELLSPROUT", "WEEPINBELL", "VICTREEBEL", "TENTACOOL", "TENTACRUEL", "GEODUDE", "GRAVELER", "GOLEM", "PONYTA", "RAPIDASH", "SLOWPOKE", "SLOWBRO", "MAGNEMITE", "MAGNETON", "FARFETCHD", "DODUO", "DODRIO", "SEEL", "DEWGONG", "GRIMER", "MUK", "SHELLDER", "CLOYSTER", "GASTLY", "HAUNTER", "GENGAR", "ONIX", "DROWZEE", "HYPNO", "KRABBY", "KINGLER", "VOLTORB", "ELECTRODE", "EXEGGCUTE", "EXEGGUTOR", "CUBONE", "MAROWAK", "HITMONLEE", "HITMONCHAN", "LICKITUNG", "KOFFING", "WEEZING", "RHYHORN", "RHYDON", "CHANSEY", "TANGELA", "KANGASKHAN", "HORSEA", "SEADRA", "GOLDEEN", "SEAKING", "STARYU", "STARMIE", "MR MIME", "SCYTHER", "JYNX", "ELECTABUZZ", "MAGMAR", "PINSIR", "TAUROS", "MAGIKARP", "GYARADOS", "LAPRAS", "DITTO", "EEVEE", "VAPOREON", "JOLTEON", "FLAREON", "PORYGON", "OMANYTE", "OMASTAR", "KABUTO", "KABUTOPS", "AERODACTYL", "SNORLAX", "ARTICUNO", "ZAPDOS", "MOLTRES", "DRATINI", "DRAGONAIR", "DRAGONITE", "MEWTWO", "MEW"];
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



//Update the placeholder when player guesses a letter that's in the word.
function updatePlaceholder(guess, solution, placeholder) {
  for (i = 0; i < solution.length; i++) {
    if (guess == solution.charAt(i)) {
      placeholder = placeholder.substr(0, i) + guess + placeholder.substr(i+1);
      $("#word").text(placeholder);
    }
  }

  return placeholder;
}



//Update the list of wrong guesses when player makes a wrong guess.
function updateGuesses(wrong, guess) {
  wrong += guess;
  $("#wrong-guesses").text(wrong);

  return wrong;
}


//Update amount of lives when one is lost
function updateLives(lives) {
  lives -= 1;
  $("#lives").text(lives + " lives left!");

  return lives;
}


//Check if player won or lost
function isGameOver(solution, placeholder, lives) {
  if (placeholder == solution) {
    alert("You won!");
  } else if (lives <= 0) {
    alert("You lost!");
    $("#word").text(solution);
  }
}
