console.log("datepicker clicked");
// month and year picker
$('#datepicker').datepicker({
   
  format: "yyyy-mm-dd",
  //startDate: "1960/01/01",
  minViewMode: 1,
  todayBtn: true,
  clearBtn: true,
  keyboardNavigation: false,
  daysOfWeekDisabled: "0,6",
  daysOfWeekHighlighted: "1,2,3,4,5"
  
});

// back to top button
$(document).ready(function() {
  console.log("top btn rdy");
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#scroll').fadeIn();
    } else {
      $('#scroll').fadeOut();
    }
  });
  $('#scroll').click(function() {
    $("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });
});