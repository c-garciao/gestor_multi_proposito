$(document).ready(function () {
    $("#menu1").hover(function () {
        $("#menu3 ul").hide();
        $("#menu2 ul").hide();
        $("#menu4 ul").hide();
    });
    $("#menu2").hover(function () {
        $("#menu2 ul").toggle();
        $("#menu3 ul").hide();
        $("#menu4 ul").hide();
    });
    $("#menu3").hover(function () {
        $("#menu2 ul").hide();
        $("#menu3 ul").toggle();
        $("#menu4 ul").hide();
    });
    $("#menu4").hover(function () {
        $("#menu2 ul").hide();
        $("#menu3 ul").hide();
        $("#menu4 ul").toggle();
    });
});