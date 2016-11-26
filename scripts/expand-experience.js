window.onload = expand;



// Runs dropdown function upon clicking a headline //

function expand() {
  var headlines = document.getElementsByClassName("expand");

  for (i=0; i<headlines.length; i++) {
    headlines[i].addEventListener("click", dropdown);
  }
}



// Shows/hides the article following the clicked headline

function dropdown() {
  description = this.nextElementSibling;

  description.style.display = (description.style.display == "block" ? "none" : "block");
}
