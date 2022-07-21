<!-- Slideshow container -->
<?php
require_once VIEW_PATH . "layout" . DS . "header.php";
linkHead(['bestsl.css'])
?>
<div class="pic"></div>
<h3>Most popular</h3>
<div class="slideshow-container">

  <?php
  foreach ($bookList as $book) {
    echo '<div class="mySlides fade">';
    echo '<a href="?p=home&c=home&a=bookdetail&bookid=' . $book["book_isbn"] . '">';
    echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($book['book_image']) . '" style="width:50%">';
    echo '</a>';
    echo '<div class="text">' . $book['book_title'] . '</div></div>';
  }
  ?>

</div>


</div>
<br> <br>

<hr size="2px">
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>