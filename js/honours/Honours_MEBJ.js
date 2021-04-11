$(function() {
  $("#nameOfJournel").autocomplete({
    source: './autocomplete/honours/Honours_MEBJ/nameOfJournel.php'
  });
  $("#nameOfPublisher").autocomplete({
    source: './autocomplete/honours/Honours_MEBJ/nameOfPublisher.php'
  });
  $("#positionHeld").autocomplete({
    source: './autocomplete/honours/Honours_MEBJ/positionHeld.php'
  });
});