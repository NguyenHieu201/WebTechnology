<?php
require_once VIEW_PATH . "layout" . DS . "header.php";
linkHead(['navbar.css', 'search.js'])
?>

<nav class="top-nav">
  <ul style="height: inherit;">
    <li><a href="?p=Home&c=Home&a=Home">Home</a></li>
    <li class="autocomplete">
      <div class="autocomplete-item">
        <input type="text" id="search" placeholder="Type to search.." name="search">
      </div>
    </li>
    <li class="a-cart"><a href="?p=cart&c=cart&a=view" onclick="checkLogin()">Cart</a></li>
    <li class="a-login"><a href="?p=home&c=Login&a=login" id="login">Login</a></li>
    <li class="a-profile" style="display: none;"><a href="?p=Customer&c=Customer&a=Profile" id="profile">Profile</a>
    </li>
    <li class="a-logout" style="display: none;"><a href="?p=Home&c=Login&a=Logout" id="logout">Logout</a></li>
  </ul>
</nav>

<script>
var countries = ["Doing Good By Doing Good", "Programmable Logic Controllers",
  "Professional JavaScript for Web Developers, 3rd Edition", "Beautiful JavaScript",
  "Professional ASP.NET 4 in C# and VB", "Android Studio New Media Fundamentals",
  "C++ 14 Quick Syntax Reference, 2nd Edition", "C# 6.0 in a Nutshell, 6th Edition"
];
autocomplete(document.getElementById("search"), countries);
displayLogout();

function displayLogout() {
  let isLogin = <?php echo isset($_SESSION["user"]) ? 1 : 0; ?>;
  if (isLogin === 1) {
    document.getElementsByClassName("a-logout")[0].style.display = "inline-block";
    document.getElementsByClassName("a-profile")[0].style.display = "inline-block";
    document.getElementsByClassName("a-login")[0].style.display = "none";
  }
}

function checkLogin() {
  let isLogin = <?php echo isset($_SESSION["user"]) ? 1 : 0; ?>;
  if (isLogin === 1) {
    window.location.href = "?p=cart&c=cart&a=view";
  } else {
    alert("Please log in before vew cart");
  }
}
</script>