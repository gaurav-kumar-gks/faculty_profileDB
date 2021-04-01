$(function() {
  $("#jtitle").autocomplete({
    source: './autocomplete/publications/conference/title.php'
  });
  $("#jauthors").autocomplete({
    source: './autocomplete/publications/conference/authors.php'
  });
  $("#jpublication").autocomplete({
    source: './autocomplete/publications/conference/publication.php'
  });
  $("#jpublisher").autocomplete({
    source: './autocomplete/publications/conference/publisher.php'
  });
});