$(function() {
  $("#nameOfTheBody").autocomplete({
    source: './autocomplete/honours/Honours_MPB/nameOfTheBody.php'
  });
  $("#membershipStatus").autocomplete({
    source: './autocomplete/honours/Honours_MPB/membershipStatus.php'
  });
});