<?php
include_once VIEW_PATH . "layout" . DS . "header.php";
include_once VIEW_PATH . "layout" . DS . "nav.php";
linkHead(["search.css"]);
?>

<body>
  <div class="products products-table">
    <?php
    foreach ($books as $book) { ?>
    <div class="product" onclick="showDetail(<?php echo $book['book_isbn'] ?>)">
      <div class="product-img">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($book['book_image']); ?>">
      </div>
      <div class="product-content">
        <h3>
          <?php echo $book["book_title"] ?>
          <small><?php echo $book["book_author"] ?></small>
        </h3>
        <p class="product-text price"><?php echo $book["book_price"] ?></p>
        <p class="product-text genre"><?php echo $book["publisher"] ?></p>
      </div>
    </div>
    <?php } ?>
  </div>
  <script>
  $("#view").click(function() {
    $(".products").toggleClass("products-table");
  });
  </script>
</body>

<script>
function showDetail(bookId) {
  window.location.href = '?p=home&c=home&a=bookdetail&bookid=' + bookId;
}
</script>