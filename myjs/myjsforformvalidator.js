$(document).ready(function () {
    $("#form1").validate();
});


$(document).ready(function () {
    $("input").focus(function () {
        $(this).css("background-color", "yellow");
    });
    $("input").blur(function () {
        $(this).css("background-color", "white");
    });
});