
// month and year picker
$('#datepicker').datepicker({
   
  format: "yyyy-mm-dd",
  //startDate: "1960/01/01",
  startView: "months",
  minViewMode: "months",
  todayBtn: true,
  clearBtn: true
  
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