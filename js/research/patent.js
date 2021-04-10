$(function() {
  $("#title").autocomplete({
    source: './autocomplete/research/patent/title.php'
  });
  $("#refn").autocomplete({
    source: './autocomplete/research/patent/refn.php'
  });
  $("#projectStatus").autocomplete({
    source: './autocomplete/research/patent/projectStatus.php'
  });
});