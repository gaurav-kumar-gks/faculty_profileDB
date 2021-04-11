$(function() {
  $("#title").autocomplete({
    source: './autocomplete/activities/Activities_SCW/title.php'
  });
  $("#place").autocomplete({
    source: './autocomplete/activities/Activities_SCW/place.php'
  });
  $("#responsibility").autocomplete({
    source: './autocomplete/activities/Activities_SCW/responsibility.php'
  });
  $("#noOfParticipants").autocomplete({
    source: './autocomplete/activities/Activities_SCW/noOfParticipants.php'
  });
});