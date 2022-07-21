<?php
require_once VIEW_PATH . "layout" . DS . "header.php";
linkHead(['column.css'])
?>
<h3>Recommend <a href="?p=home&c=home&a=booksearch" style="font-size: 14px;">view all</a></h3>
<br>
<div class=" recommend">
  <?php
  for ($i = 0; $i < $recommendSize; $i++) {
    if ($i % 4 == 0) echo '<div class="row">';
    // echo '<div class="column">' . $i . '</div>';
    echo '<a href="?p=home&c=home&a=bookdetail&bookid=' . $book["book_isbn"] . '">';
    echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($book['book_image']) . '" style="width:25%">';
    echo '</a>';
    if ($i % 4 == 3 | $i == $recommendSize - 1) echo '</div>';
  }

  ?>
</div>
<hr>