$(function() {
  $("#placeOfVisit").autocomplete({
    source: './autocomplete/honours/Honours_IL/placeOfVisit.php'
  });
  $("#lectureTitle").autocomplete({
    source: './autocomplete/honours/Honours_IL/lectureTitle.php'
  });
});