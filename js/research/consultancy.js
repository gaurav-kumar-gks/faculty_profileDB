$(function() {
  $("#title").autocomplete({
    source: './autocomplete/research/consultancy/title.php'
  });
  $("#other").autocomplete({
    source: './autocomplete/research/consultancy/other.php'
  });
  $("#rpi").autocomplete({
    source: './autocomplete/research/consultancy/rpi.php'
  });
  $("#rcopi").autocomplete({
    source: './autocomplete/research/consultancy/rcopi.php'
  });
});