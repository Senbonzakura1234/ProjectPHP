(function ($) {

    'use strict';

    // bootstrap dropdown hover






    $('nav .dropdown').hover(function () {
        let $this = $(this);
        $this.addClass('show');
        $this.find('> a').attr('aria-expanded', true);
        $this.find('.dropdown-menu').addClass('show');
    }, function () {
        let $this = $(this);
        $this.removeClass('show');
        $this.find('> a').attr('aria-expanded', false);
        $this.find('.dropdown-menu').removeClass('show');
    });


    $('#dropdown04').on('show.bs.dropdown', function () {
        console.log('show');
    });


})(jQuery);


let newWindowWidth = $(window).width(),
    newWindowHeight= $(window).height(),
    headerHeight = $("#header-banner").outerHeight(),
    carouselHeight = newWindowHeight - headerHeight,
    carouselHeightExpand = newWindowHeight - headerHeight/3;
if (newWindowWidth < 768) {
    $(".carousel-home-span").css("height",carouselHeight);
}
else if(newWindowWidth >= 768 && carouselHeight <= 1200)
{
    $(".carousel-home-span").css("height",carouselHeight);
    $(document).scroll(function() {
        if($(window).scrollTop() < 40){

            $(".carousel-home-span").css("height",carouselHeight);

        }else if($(window).scrollTop() > headerHeight/2){

            $(".carousel-home-span").css("height",carouselHeightExpand);

        }
    });
}else{
    $(".carousel-home-span").css("height",1200);
}
$(window).load(function(){
    function hide_loading(){
        $( ".loading" ).fadeOut( 1000 );
        $(' html, body').css({overflow: 'auto'});
    }
    window.setTimeout( hide_loading, 1000 );
});



$(document).keydown(function(e){
    if(e.which === 123){

        return false;
    }
});
$(document).bind("contextmenu",function(e) {
    e.preventDefault();
});


let menuWidth = $(".menu-header-sm").outerWidth(),
    menuLeftValue = -menuWidth,
    footerHeight = $(".site-footer").outerHeight(),
    maxScrollTop = $(document).height() - $(window).height() + 90 - footerHeight;
$(function() {
    $(".menu-button").click(function () {
        $(".menu-header-sm").css("left", 0);
        $(".close-menu-sm").css("display", "block");
        $(' html, body').css({overflow: 'hidden'});
    });
    $(".close-menu-sm").click(function(){
        $(".menu-header-sm").css("left",menuLeftValue);
        $(".close-menu-sm").css("display", "none");
        $(' html, body').css({overflow: 'auto'});
    });
    $("#dropdownTrigger1-sm").click(function(){
        $("#dropDownMenu1-sm").slideToggle();
        $("#dropDownMenu2-sm").slideUp();
    });
    $("#dropdownTrigger2-sm").click(function(){
        $("#dropDownMenu2-sm").slideToggle();
        $("#dropDownMenu1-sm").slideUp();
    });


    $("#dropDownMenu1-lg-link").click(function(){
        $("#dropDownMenu1-lg").slideToggle();
        $("#dropDownMenu2-lg").slideUp();
        $("#dropDownMenuCart-lg").slideUp();
        $(".close-menu-lg").css("display", "block");
        $("#dropDownMenu1-lg-trigger").css("background", "#77DAF6");
        $("#dropDownMenu1-lg-link").css("color", "white");
        $("#dropDownMenu2-lg-trigger").css("background", "white");
        $("#dropDownMenu2-lg-link").css("color", "#77DAF6");
    });
    $("#dropDownMenu2-lg-link").click(function(){
        $("#dropDownMenu2-lg").slideToggle();
        $("#dropDownMenu1-lg").slideUp();
        $("#dropDownMenuCart-lg").slideUp();
        $(".close-menu-lg").css("display", "block");
        $("#dropDownMenu2-lg-trigger").css("background", "#77DAF6");
        $("#dropDownMenu2-lg-link").css("color", "white");
        $("#dropDownMenu1-lg-trigger").css("background", "white");
        $("#dropDownMenu1-lg-link").css("color", "#77DAF6");
    });
    $("#dropDownMenuCart-lg-link").click(function(){
        $("#dropDownMenu2-lg").slideUp();
        $("#dropDownMenu1-lg").slideUp();
        $("#dropDownMenuCart-lg").slideToggle();
        $(".close-menu-lg").css("display", "block");
    });
    $(".close-menu-lg").click(function(){
        $("#dropDownMenu2-lg").slideUp();
        $("#dropDownMenu1-lg").slideUp();
        $("#dropDownMenuCart-lg").slideUp();
        $(".close-menu-lg").css("display", "none");
        $("#dropDownMenu1-lg-trigger").css("background", "white");
        $("#dropDownMenu1-lg-link").css("color", "#77DAF6");
        $("#dropDownMenu2-lg-trigger").css("background", "white");
        $("#dropDownMenu2-lg-link").css("color", "#77DAF6");
    });

    $(".alert").click(function () {
        $(".alert").fadeOut();
    });
});
$(document).scroll(function() {
    if($(window).scrollTop() <= newWindowHeight){

        $(".back-to-top").fadeOut();

    }else if($(window).scrollTop() > newWindowHeight){

        $(".back-to-top").fadeIn();

    }
    if($(window).scrollTop() <= maxScrollTop){

        $(".back-to-top").css("color", "#77DAF6");

    }else if($(window).scrollTop() > maxScrollTop){

        $(".back-to-top").css("color", "white");

    }

});
$(".back-to-top").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});
