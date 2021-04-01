$(function() {
  $("#jtitle").autocomplete({
    source: './autocomplete/publications/journal/title.php'
  });
  $("#jauthors").autocomplete({
    source: './autocomplete/publications/journal/authors.php'
  });
  $("#jpublication").autocomplete({
    source: './autocomplete/publications/journal/publication.php'
  });
  $("#jpublisher").autocomplete({
    source: './autocomplete/publications/journal/publisher.php'
  });
});
