<?php
include VIEW_PATH . DS . "layout" . DS . "header.php";
include VIEW_PATH . DS . "layout" . DS . "nav.php";
linkHead(["book.css"]);
?>

<div class="card">
  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($book['book_image']); ?>" style="width:100%"
    alt="Book Name" />
  <h1><?php echo $book["book_title"] ?></h1>
  <p class="price"><?php echo $book["book_price"] ?></p>
  <p class="author"><?php echo $book["book_author"] ?></p>
  <p class="publisher"><?php echo $book["publisher"] ?></p>
  <p>Some book description</p>
  <p><button onclick="addToCart(<?php echo $book["book_isbn"] ?>)">Add to Cart</button></p>
</div>
<script>
function addToCart(itemId) {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let message = this.responseText;
      alert(message);
    }
  };
  xhttp.open("GET", "?p=cart&c=cart&a=add&itemid=" + itemId, true);
  xhttp.send();
}
</script>

<?php
include_once VIEW_PATH . "layout" . DS . "footer.php";
?>