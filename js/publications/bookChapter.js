$(function() {
  $("#jtitle").autocomplete({
    source: './autocomplete/publications/bookChapter/title.php'
  });
  $("#jauthors").autocomplete({
    source: './autocomplete/publications/bookChapter/authors.php'
  });
  $("#jpublication").autocomplete({
    source: './autocomplete/publications/bookChapter/publication.php'
  });
  $("#jpublisher").autocomplete({
    source: './autocomplete/publications/bookChapter/publisher.php'
  });
  $("#btitle").autocomplete({
    source: './autocomplete/publications/bookChapter/btitle.php'
  });
});