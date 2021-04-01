$(function() {
  $("#jtitle").autocomplete({
    source: './autocomplete/publications/editedVolumes/title.php'
  });
  $("#jauthors").autocomplete({
    source: './autocomplete/publications/editedVolumes/authors.php'
  });
  $("#jpublication").autocomplete({
    source: './autocomplete/publications/editedVolumes/publication.php'
  });
  $("#jpublisher").autocomplete({
    source: './autocomplete/publications/editedVolumes/publisher.php'
  });
  $("#editedVolume").autocomplete({
    source: './autocomplete/publications/editedVolumes/editedVolume.php'
  });
});