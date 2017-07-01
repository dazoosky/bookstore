<?php
require_once './src/conn.php';
function __autoload($classname) {
    $filename = './src/'.$classname.'.php';
    require_once ($filename);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(!(isset($_GET['id']))){
        $books = Book::loadAllFromDB($conn);
        $booksArray = [];
        foreach ($books as $book) {
            $bookJson = json_encode($book);
            $booksArray[] = $bookJson;
        }
        echo json_encode($booksArray);
    }
    else {
        $book = Book::loadFromDB($conn, $_GET['id']);
        echo json_encode($book);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newBook = new Book;
    $canBeAdd = true;
    if ($_POST['author'] != '' && $_POST['title'] != '' && $_POST['description'] != '') {
    //Sprawdzenie czy inputy są stringami
        if (is_string($_POST['author']) && strlen($_POST['author'])) {
            $newBook->setAuthor($_POST['author']);
        }
        else {$canBeAdd = false; }
        if ($canBeAdd === true && is_string($_POST['title']) && strlen($_POST['title'])) {    
            $newBook->setTitle($_POST['title']);
        }
        else {$canBeAdd = false; }
        if ($canBeAdd === true && is_string($_POST['description'])&& strlen($_POST['description'])) {    
            $newBook->setDescription($_POST['description']);
        }
        else { $canBeAdd = false; }
        //Zapisanie do bazy po pozytywnej walidacji
        if ($canBeAdd === true) {
        $result = $newBook->saveToDB($conn); 
        }
            else {$result = false; } // Nastawienie result na false w przypadku nieudanej walidacji
        if ($result !== false) {
            $array = [$result, "Added new book!"];
            echo json_encode($array); //Rzucenie komunikatu do API wraz z ID nowej pozycji
        }
        else {
            echo json_encode([false, "Sth went wrong"]); //Rzucenie komunikatu o niepowodzeniu
        }
    }
    else {
            echo json_encode([false, "Sth went wrong"]); //Rzucenie komunikatu o niepowodzeniu
        }
    
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents("php://input"), $id);
    if (Book::deleteFromDB($conn, $id['id'])) {
        echo json_encode("Book deleted");
    }
    else {
        echo json_encode("Sth went wrong with delete request :(");
    }
}