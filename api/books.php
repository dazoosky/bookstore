<?php
require_once './src/conn.php';
function __autoload($classname) {
    $filename = './src/'.$classname.'.php';
    require_once ($filename);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(!isset($_GET['id'])){
        $books = Book::loadAllFromDB($conn);
        var_dump($books);
        $booksArray = [];
        foreach ($books as $book) {
            $bookJson = json_encode($book);
            $booksArray[] = $bookJson;
        }
        var_dump(json_encode($booksArray));
        return json_encode($booksArray);
    }
    else {
        $book = Book::loadFromDB($conn, $_GET['id']);
    }
}
