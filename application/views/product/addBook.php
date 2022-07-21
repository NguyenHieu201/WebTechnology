<?php
include VIEW_PATH . DS . "layout" . DS . "header.php";
linkHead(["book.css"]);
?>

<form action="?p=admin&c=Index&a=add" method="post" role="form" enctype="multipart/form-data">
  <div class="card">

    <div>
      <img id="img" src="" width="100" height="100" alt="BookCover" onchange="" />
      <input type="file" name="image"
        onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
    </div>
    <input type="text" name="book_title" value="" placeholder="Title" required>
    <input type="text" name="book_author" value="" placeholder="Author" required>
    <input type="text" name="publisher" value="" placeholder="Publisher" required>
    <input type="number" step="0.01" name="book_price" value="" placeholder="Price" class="price" required>
    <input type="submit" name="submit" value="Submit" class="button" required>
    <div class="button cancel" style="width: inherit;"><a href="?p=admin&c=Index&a=product">Cancel</a></div>
  </div>
</form>