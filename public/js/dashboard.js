
$(window).load(function(){
    function show_popup(){
        $( ".loading" ).fadeOut( 1000 );
        $(' html, body').css("overflow-y", "auto");
    }
    window.setTimeout( show_popup, 2000 );
});


$(document).keydown(function(e){
    if(e.which === 123){

        return false;
    }
});
$(document).bind("contextmenu",function(e) {
    e.preventDefault();
});
$(function() {
    $("#search-top-show-md").click(function () {
        $(".search-top-md").slideToggle();
        $(".close-search-top-md").toggle();
    });
    $(".close-search-top-md").click(function () {
        $(".search-top-md").slideUp();
        $(".close-search-top-md").hide();
    });
    $(".alert").click(function () {
        $(".alert").fadeOut();
    });
    setTimeout(
        function(){
            $(".needToRemove").remove();
        }, 3000
    );
});
$('.select-form').selectpicker();

//  navbar footer
let newWindowHeight4 = $(window).height(),
    navbarHeight = $(".navbar-bar").outerHeight(),
    mainMinHeight = newWindowHeight4 - navbarHeight;
    $(".main-dashboard").css("min-height",mainMinHeight);

