//$(document).ready(function(){
//    
//})
$(function () {
    $("#signup").on('vclick', function () {});
    $("#login").on('vclick', function () {});
    $("#login").on('submit', function () {
        return false;
    });
    $("#signup").on('submit', function () {
        return false;
    });
    $(".flat").on('click', function () {
        $('.flat_ui').slideToggle();
    });
    $(".vhcl").on('click', function () {
        $('.vhcl_ui').slideToggle();
    });
    $(".machn").on('click', function () {
        $('.machn_ui').slideToggle();
    });

    function hide_oth_ad() {
        $('.opt').not('#active_ad').remove();
    }
    $(".opt").on("click", function () {
        $(this).attr('id', 'active_ad');
        hide_oth_ad();
        $(".or_menu").show();
    });
    $(".prop_headi, .or_menu").on("click", function () {
        location.reload();
    });




});
