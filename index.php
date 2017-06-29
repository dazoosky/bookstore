<html>
    <head>
        <title>Bookstore homepage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="./style/style.css">
        
        
    </head>
    <body>
        <div class="centered">
            <h3>Add new book:</h3>
            <div class = "formDiv">
                
                <form id="addForm" action="./api/books.php" method="post">
                    Author:<input type="text" maxlength="255" id="author" name="author" placeholder="Author..."><br>
                    Title:<input type="text" maxlength="255" id="title" name="title" placeholder="Author..."><br>
                    Descrption:<input type="text" maxlength="255" id="description" name="description" placeholder="Short description..."><br>
                    <input type="submit" value="Add!">
                </form>
            </div><br>
            <h1>Books List:</h1>
            <div id="booksList" class="centered">
            </div>
        </div>
    </body>
    <script src="api/js/api.js"></script>
</html>
