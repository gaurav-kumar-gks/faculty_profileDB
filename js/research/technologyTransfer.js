$(function() {
  $("#title").autocomplete({
    source: './autocomplete/research/technologyTransfer/title.php'
  });
  $("#other").autocomplete({
    source: './autocomplete/research/technologyTransfer/other.php'
  });
});