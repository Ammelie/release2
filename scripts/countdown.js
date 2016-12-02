var liaDate = new Date("2018-01-15");
var graduationDate = new Date("2018-05-31");


// Runs calculate for both dates and places the resulting timers on the index page

$(document).ready(function addTimers() {
  var now = new Date();

  var timeToLIA = calculate(liaDate, now);
  var timeToGraduation = calculate(graduationDate, now);

  document.getElementById("lia").innerHTML = timeToLIA;
  document.getElementById("graduation").innerHTML = timeToGraduation;

  setTimeout(addTimers, 3600000);
});



// Calculates time left and returns a countdown

function calculate(goal, start) {
  var timeLeft = (goal.getTime() - start.getTime()) / 1000 / 60;

  var hours = Math.floor(timeLeft/60);
  var days = Math.floor(hours/24);

  hours %= 24;

  return days + " days " + hours + " hours";
}
