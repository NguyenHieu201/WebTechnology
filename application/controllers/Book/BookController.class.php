<?php
class BookController extends Controller
{
  private $bookModel;
  function __construct()
  {
    $this->bookModel = new BookModel();
  }

  public function getBookAction()
  {
    $book_id = $_REQUEST["book_id"];
    $book = $this->bookModel->getBook($book_id);
    $bookInformation = [
      "book_isbn" => $book["book_isbn"],
      "book_title" => $book["book_title"],
      "book_author" => $book["book_author"],
      "book_image" => "data:image/jpg;charset=utf8;base64," . base64_encode($book['book_image']),
      "book_price" => $book["book_price"],
      "publisher" => $book["publisher"]
    ];
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($bookInformation);
  }
}