$(function() {
  $("#pov").autocomplete({
    source: './autocomplete/activities/Activities_VA/pov.php'
  });
  $("#duration").autocomplete({
    source: './autocomplete/activities/Activities_VA/duration.php'
  });
  $("#purpose").autocomplete({
    source: './autocomplete/activities/Activities_VA/purpose.php'
  });
});