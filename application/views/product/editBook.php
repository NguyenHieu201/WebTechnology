<?php
include VIEW_PATH . DS . "layout" . DS . "header.php";
linkHead(["book.css"]);
?>

<form action="?p=admin&c=Index&a=edit" method="post" role="form" enctype="multipart/form-data">
  <div class="">

    <div>
      <img id="img" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($book['book_image']); ?>"
        width="100" height="100" alt="Book Name" onchange="" />
      <input type="file" name="image"
        onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
    </div>
    <input type="text" name="book_title" value="<?php echo $book["book_title"] ?>" required>
    <input type="text" name="book_author" value="<?php echo $book["book_author"] ?>" required>
    <input type="text" name="publisher" value="<?php echo $book["publisher"] ?>" required>
    <input type="number" step="0.01" name="book_price" value="<?php echo $book["book_price"] ?>" required>
    <input type="text" name="book_isbn" value="<?php echo $book["book_isbn"] ?>" hidden>
    <input type="submit" name="submit" value="Submit">
    <div class="button"><a href="?p=admin&c=Index&a=product">Cancel</a></div>
  </div>
</form>