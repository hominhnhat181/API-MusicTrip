var ENDPOINT = "{{ url('/') }}";
var page = 1;
// view height
var viewH = $(document).height();
load_more(page);

$(window).scroll(function () {
    // full web height
    var webH = $(window).height();
    if ($(document).scrollTop() >= webH - viewH - 3) {
        page++;
        load_more(page);
    }
    // console.log($(document).scrollTop());
    // console.log(webH - viewH );
    // console.log(viewH);
});

function load_more(page) {
    $.ajax({
        url: ENDPOINT + "/?page=" + page,
        type: "get",
        datatype: "html",
        beforeSend: function () {
            $(".auto-load").show();
        },
    })
        .done(function (data) {
            if (data.length == 0) {
                $(".auto-load").html("No more records!");
                return;
            }
            $(".auto-load").hide();
            $("#list_feature").append(data);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert("No response from server");
        });
}
$(document).ready(function () {
    //change the integers below to match the height of your upper div, which I called
    //banner.  Just add a 1 to the last number.  console.log($(window).scrollTop())
    //to figure out what the scroll position is when exactly you want to fix the nav
    //bar or div or whatever.  I stuck in the console.log for you.  Just remove when
    //you know the position.
    $(window).scroll(function () {
        console.log($(window).scrollTop());
        if ($(window).scrollTop() > 1) {
            $("#navigation-example").addClass("navbar-fixed-top");
            $("#navigation-example").removeClass("navbar-custom");
            console.log("add class fixed to nav");
        }
        if ($(window).scrollTop() < 1) {
            $("#navigation-example").addClass("navbar-custom");
            $("#nav_bar").removeClass("navbar-fixed-top");
            console.log("remove class fixed to nav");
        }
    });
});
