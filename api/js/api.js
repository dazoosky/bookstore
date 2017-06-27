var response = '';
var test = $.get({
    url: "http://date.jsontest.com/",
    data: {},
    type: "GET",
    dataType: "json",
    success: function(text){
        response = JSON.parse(this.responseJSON);
    }
});
//console.log(test);
//alert(response.responseText);

var test2 = $.ajax({
        url: "./api/books.php", 
        data: {},
        type: "GET",
        dataType : "json",
        success: function( json ) {
            console.log(json)
        },
        error: function( xhr, status, errorThrown ) {},
        complete: function( xhr, status ) {}
    });

console.log(test2)
document.write(test2)