$(function() {
  $("#jtitle").autocomplete({
    source: './autocomplete/publications/otherPublications/title.php'
  });
  $("#jauthors").autocomplete({
    source: './autocomplete/publications/otherPublications/authors.php'
  });
  $("#jpublication").autocomplete({
    source: './autocomplete/publications/otherPublications/publication.php'
  });
  $("#jpublisher").autocomplete({
    source: './autocomplete/publications/otherPublications/publisher.php'
  });
});
