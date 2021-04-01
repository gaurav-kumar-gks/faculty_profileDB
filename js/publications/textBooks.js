$(function() {
  $("#jtitle").autocomplete({
    source: './autocomplete/publications/textBooks/title.php'
  });
  $("#jauthors").autocomplete({
    source: './autocomplete/publications/textBooks/authors.php'
  });
  $("#jpublication").autocomplete({
    source: './autocomplete/publications/textBooks/publication.php'
  });
  $("#jpublisher").autocomplete({
    source: './autocomplete/publications/textBooks/publisher.php'
  });
});