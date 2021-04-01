$(function() {
  $("#jtitle").autocomplete({
    source: './autocomplete/publications/educationalPackages/title.php'
  });
  $("#jauthors").autocomplete({
    source: './autocomplete/publications/educationalPackages/authors.php'
  });
  $("#jpublication").autocomplete({
    source: './autocomplete/publications/educationalPackages/publication.php'
  });
  $("#jpublisher").autocomplete({
    source: './autocomplete/publications/educationalPackages/publisher.php'
  });
});
