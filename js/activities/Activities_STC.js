$(function() {
  $("#title").autocomplete({
    source: './autocomplete/activities/Activities_STC/title.php'
  });
  $("#duration").autocomplete({
    source: './autocomplete/activities/Activities_STC/duration.php'
  });
  $("#courseBudget").autocomplete({
    source: './autocomplete/activities/Activities_STC/courseBudget.php'
  });
  $("#noOfParticipants").autocomplete({
    source: './autocomplete/activities/Activities_STC/noOfParticipants.php'
  });
  $("#role").autocomplete({
    source: './autocomplete/activities/Activities_STC/role.php'
  });
  $("#type").autocomplete({
    source: './autocomplete/activities/Activities_STC/type.php'
  });
});