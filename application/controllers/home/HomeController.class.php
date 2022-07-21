<?php
class HomeController extends Controller
{
  public function HomeAction()
  {
    $bestSeller = [4, 6, 5];
    $bookList = [];
    $bookModel = new BookModel();
    $bookAll = $bookModel->getBooks();
    $recommendSize = count($bookAll);
    foreach ($bestSeller as $bookId) {
      $book = $bookModel->getBook($bookId);
      $bookList[] = ($book);
    }
    include VIEW_PATH . "home" . DS . "Homepage.php";
  }

  public function CartAction()
  {
    $this->redirect("?p=Cart&c=Cart&a=view", "view cart");
  }

  public function BookSearchAction()
  {
    $bookModel = new BookModel();
    $books = $bookModel->getBooks();
    include VIEW_PATH . "home" . DS . "Booksearch.php";
  }

  public function BookDetailAction()
  {
    if (isset($_REQUEST["bookid"])) {
      $bookId = $_REQUEST["bookid"];
      $bookModel = new BookModel();
      $book = $bookModel->getBook($bookId);
      include VIEW_PATH . 'product' . DS . 'product.php';
    }
  }
}