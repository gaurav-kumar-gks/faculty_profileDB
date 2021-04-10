$(function() {
  $("#title").autocomplete({
    source: './autocomplete/research/copyright/title.php'
  });
  $("#other").autocomplete({
    source: './autocomplete/research/copyright/other.php'
  });
  $("#refn").autocomplete({
    source: './autocomplete/research/copyright/refn.php'
  });
  $("#projectStatus").autocomplete({
    source: './autocomplete/research/copyright/projectStatus.php'
  });
  $("#juri").autocomplete({
    source: './autocomplete/research/copyright/juri.php'
  });
});