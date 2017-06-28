
function loadAllBooks() {
    var allBooks = $.ajax({
        url: "./api/books.php", 
        data: {},
        type: "GET",
        dataType : "json"})
        .done(function(json) {
//            console.log(json[0])
            $(json).each(function(){
                var booksList = $("#booksList")
                var newDiv = $('<div class="book">')
                newDiv.html('<div class="title">'+(JSON.parse(this)).title+'</div><div class="desc hidden">'+(JSON.parse(this)).description+'</div>')
                newDiv.appendTo(booksList)
                
//                console.log((JSON.parse(this)).title);
            })
            showDescription()
        });
}
$(function(){
    loadAllBooks()
})
//loadAllBooks()

function showDescription() {
    console.log($('.title'))
    $('.title').on('click', function(){
        $(this).next().toggleClass('hidden')
    })
}

