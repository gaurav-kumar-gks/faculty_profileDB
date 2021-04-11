$(function() {
  $("#ltp").autocomplete({
    source: './autocomplete/teaching/ltp.php'
  });
  $("#subCode").autocomplete({
    source: './autocomplete/teaching/subCode.php'
  });
});