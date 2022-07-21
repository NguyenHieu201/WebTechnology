<?php
class BookModel extends Model
{
  function __construct()
  {
    parent::__construct("books");
  }

  public function getAllBookId()
  {
    $sql = "select book_isbn from $this->table";
    $booksId = $this->db->getAll($sql);
    $id = [];
    foreach ($booksId as $bookId) {
      $id[] = $bookId["book_isbn"];
    }
    return $id;
  }

  public function getBooks()
  {
    $sql = "select * from $this->table";
    $books = $this->db->getAll($sql);
    return $books;
  }

  public function getRecommendBook($number)
  {
    $number = 12;
    $sql = "select * from $this->table limits $number";
    $books = $this->db->getAll($sql);
    return $books;
  }

  public function editBook($bookIsbn)
  {
    $book = $this->selectByPk($bookIsbn);
    return $book;
  }

  public function updateBook($book)
  {
    $this->update($book);
  }

  public function getBook($bookIsbn)
  {
    $sql = "select * from $this->table where book_isbn = " . '"' . "$bookIsbn" . '"';
    $book = $this->db->getRow($sql);
    return $book;
  }

  public function getBooksCart($bookIdList)
  {
    $bookList = [];
    foreach ($bookIdList as $bookId) {
      $book = $this->selectByPk($bookId);
      $bookList[] = $book;
    }
    return $bookList;
  }

  public function addBook($book)
  {
    $this->insert($book);
  }

  public function deleteBook($bookIsbn)
  {
    $this->delete($bookIsbn);
  }

  public function findBookByAuthor($author)
  {
  }

  public function findBookByPublisher($publisher)
  {
  }

  public function findBookByCategory($category)
  {
  }

  public function cleanString($str)
  {
    return $this->db->escape_string($str);
  }
}