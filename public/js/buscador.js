$(document).ready(function(){
    $("#myTable").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log("funciona");
        $("#TableModelos tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});