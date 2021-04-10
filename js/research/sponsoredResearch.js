$(function() {
  $("#title").autocomplete({
    source: './autocomplete/research/sponsoredResearch/title.php'
  });
  $("#other").autocomplete({
    source: './autocomplete/research/sponsoredResearch/other.php'
  });
  $("#rpi").autocomplete({
    source: './autocomplete/research/sponsoredResearch/rpi.php'
  });
  $("#rcopi").autocomplete({
    source: './autocomplete/research/sponsoredResearch/rcopi.php'
  });
});