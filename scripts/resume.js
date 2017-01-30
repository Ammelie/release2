//Make CV headers (which have a class expand) collapsible accordions
$(document).ready(function () {
  $(".expand").accordion({
    collapsible: true,
    active: false,
    heightStyle: "content"
  });
});
