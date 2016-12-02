// Runs calculate for both dates and places the resulting timers on the index page

$(document).ready(function addTimers() {
  var now = new Date();
  var liaDate = new Date("2018-01-15 09:00:00");
  var graduationDate = new Date("2018-05-31 15:00:00");

  var timeToLIA = calculate(liaDate, now);
  var timeToGraduation = calculate(graduationDate, now);

  $("#lia").html(timeToLIA);
  $("#graduation").html(timeToGraduation);

  setTimeout(addTimers, 1000);
});



// Calculates time left and returns a countdown

function calculate(goal, start) {
  var timeLeft = (goal.getTime() - start.getTime());

  var seconds = Math.floor(timeLeft/1000);
  var minutes = Math.floor(seconds/60);
  var hours = Math.floor(minutes/60);
  var days = Math.floor(hours/24);
  var weeks = Math.floor(days/7);
  var months = Math.floor(weeks/4);
  var years = Math.floor(months/12);

  seconds %= 60;
  minutes %= 60;
  hours %= 24;
  days %= 7;
  weeks %= 4;
  months %= 12;

  //formats the string to output (skips the time unit if it's 0, otherwise concatenates it in singular or plural depending on value)
  var countdown = years < 1 ? "" : years < 2 ? years + "&nbsp;year " : years + "&nbsp;years ";
  countdown = months < 1 ? countdown : months < 2 ? countdown += months + "&nbsp;month " : countdown += months + "&nbsp;months ";
  countdown = weeks < 1 ? countdown : weeks < 2 ? countdown += weeks + "&nbsp;week " : countdown += weeks + "&nbsp;weeks ";
  countdown = days < 1 ? countdown : days < 2 ? countdown += days + "&nbsp;day " : countdown += days + "&nbsp;days ";

  //keeping this for now, in case I find an appropriate use case
  // countdown = hours < 1 ? countdown : hours < 2 ? countdown += hours + &nbsp;hour " : countdown += months + &nbsp;hours ";
  // countdown = minutes < 1 ? countdown : minutes < 2 ? countdown += minute + &nbsp;minute " : countdown += minutes + "&nbsp;minutes ";
  // countdown = seconds < 1 ? countdown : seconds < 2 ? countdown += seconds + "&nbsp;second" : countdown += seconds + "&nbsp;seconds";

  return countdown;
}
