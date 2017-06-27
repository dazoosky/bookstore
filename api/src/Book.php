<?php
require_once __DIR__ . "/conn.php";
class Book implements JsonSerializable {
    protected $id;
    protected $title;
    protected $author;
    protected $description;
    
    public function __construct($id = 0) {
            if ($id != 0) {
                $this->id = $id;
            }
            else {
                $this->id = -1;
            }
            $this->title = null;
            $this->author = null;
            $this->description = null;
    }
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function saveToDB(PDO $conn) {
        if($this->id == -1) {
            $stmt = $conn->prepare('INSERT INTO books(title, author, description) '
                    . 'VALUES (:title, :author, :desc)');
            $result = $stmt->execute([ 
                'title' => $this->title, 
                'author'=> $this->author,
                'desc'=> $this->description]);
            if ($result !== false) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        } else {
            $stmt = $conn->prepare('UPDATE books SET title = :title, author = :author, description = :desc WHERE id=:id');
            $result = $stmt->execute([ 
                'id' => $this->id, 
                'title' => $this->title, 
                'author'=> $this->author,
                'desc'=> $this->description]);
            return $result;
        }
        return false;
    }
    public static function loadFromDB(PDO $conn, $id) {
        $sql = 'SELECT * FROM books WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt;
        if ($result == true && $stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $loadedBook = new Book($id);
            $loadedBook->setAuthor($row['author']);
            $loadedBook->setTitle($row['title']);
            $loadedBook->setDescription($row['description']);
            
        }
        return $loadedBook;
    }
    
    public static function loadAllFromDB(PDO $conn) {
        $array = [];
        $query = 'SELECT * FROM books';
        $result = $conn->query($query);
        if ($result == true && $result->rowCount() > 1) {
            $allBooks = $result->fetchAll();
            foreach ($allBooks as $book) {
                $loadedBook = new Book($book['id']);
                $loadedBook->setAuthor($book['author']);
                $loadedBook->setTitle($book['title']);
                $loadedBook->setDescription($book['description']);
                $array[] = $loadedBook;
            }
        }
        return $array;
    }
    
    public static function deleteFromDB(PDO $conn, $id) {
        $query = ('DELETE FROM books WHERE id = '.$id);
        $result = $conn->query($query);
    }
    
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description
        ];
    }
}

