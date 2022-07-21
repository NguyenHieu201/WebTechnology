<?php
require_once VIEW_PATH . "layout" . DS . "header.php";
linkHead(['productlist.css'])
?>

<div style="overflow-x:auto;">
  <button class="button button1"><a href="?p=admin&c=Index&a=add">Insert new book</a></button>
  <input type="text" placeholder="Type to search..">
  <button class="logout-btn"><a href="?p=Home&c=Login&a=Logout">Log out</a></button>
  <table class="table" style="margin-top: 20px">
    <thead height="50px">
      <tr>
        <th width="30px">ID</th>
        <th width="300px">Title</th>
        <th width="200px">Author</th>
        <th>Image</th>

        <th width="80px">Price</th>
        <th width="150px">Publisher</th>
        <th width="100px">&nbsp;</th>
        <th width="100px">&nbsp;</th>
      </tr>
    </thead>
    <?php foreach ($books as $book) { ?>
    <tr>
      <td><?php echo $book['book_isbn']; ?></td>
      <td>
        <?php echo $book['book_title']; ?>
      </td>
      <td><?php echo $book['book_author']; ?></td>
      <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($book['book_image']); ?>"
          alt="BookCover" style="width: 30%;"></td>
      <td><?php echo $book['book_price']; ?></td>
      <td><?php echo $book['publisher']; ?></td>
      <td><a href="?p=admin&c=Index&a=edit&book_isbn=<?php echo $book['book_isbn']; ?>">Edit</a></td>
      <td><a href="?p=admin&c=Index&a=delete&book_isbn=<?php echo $book['book_isbn']; ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</div>