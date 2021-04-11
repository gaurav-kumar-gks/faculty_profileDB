$(function() {
  $("#title").autocomplete({
    source: './autocomplete/research/guidance/title.php'
  });
  $("#other").autocomplete({
    source: './autocomplete/research/guidance/other.php'
  });
  $("#rcopi").autocomplete({
    source: './autocomplete/research/guidance/rcopi.php'
  });
  $("#remarks").autocomplete({
    source: './autocomplete/research/guidance/remarks.php'
  });
  $("#rlevel").autocomplete({
    source: './autocomplete/research/guidance/rlevel.php'
  });
});