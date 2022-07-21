<?php
include_once VIEW_PATH . "layout" . DS . "header.php";
include_once VIEW_PATH . "layout" . DS . "nav.php";
linkHead(["cart.css"]);
?>
<div class="itemcart">
  <div>
    <table>
      <tr>
        <td class="ha">
          Book Cover
        </td>
        <td class="sp">
          Book Title
        </td>
        <td class="dg">
          Price
        </td>
        <td class="sl"> Quantity</td>
      </tr>

      <?php
      for ($i = 0; $i < count($bookList); $i++) {
        echo '<tr class="item" id="' . $bookList[$i]["book_isbn"] . '">';
        echo '<td class="img">';
        echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($bookList[$i]["book_image"]) . '"alt="BookCover">';
        echo '</td>';
        echo '<td class="name">' . $bookList[$i]["book_title"] . '</td>';
        echo '<td class="price">' . $bookList[$i]["book_price"] . 'd</td>';
        echo '<td class="soluong">';
        echo '<input class="slpicker quantity" name="quantity" type="number" value="' . $quantity[$i] . '" min="1" onchange="calBill()"> ';
        echo '</td>';
        echo '<td><Button onclick="deleteItem(' . $bookList[$i]["book_isbn"] . ')">Delete</Button></td>';
        echo '</tr>';
      }
      ?>

    </table>
    <div class="sidebar">
      Total:
      <div class="totalnumber" id="bill"></div>
      <br></br>
      <button style="width: 100px">
        Xac nhan thanh toan
      </button>

    </div>
  </div>


</div>

<script>
calBill();

function deleteItem(itemId) {
  let item = document.getElementById(itemId);
  item.style.display = "none";
  let xhttp = new XMLHttpRequest();
  xhttp.open("GET", "?p=cart&c=cart&a=delete&itemid=" + itemId, true);
  xhttp.send();
}

function calBill() {
  let bill = document.getElementById("bill");
  let items = document.getElementsByClassName("price");
  let quantity = document.querySelectorAll('input[name=quantity]');
  let result = 0;
  for (let i = 0; i < items.length; i++) {
    result += parseInt(items[i].textContent) * parseInt(quantity[i].value);
  }

  bill.innerHTML = result;


}
</script>
<?php
include_once VIEW_PATH . "layout" . DS . "footer.php";
?>