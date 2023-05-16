//menu active
let currentUrl = location.href;
let currentUrlArr = currentUrl.split("?");

$(".menu-item").each(function (index) {
    let selected = $(this).attr("href");
    if(selected == currentUrlArr[0]){
        $(this).addClass("active");

        // left menu auto scroll
        let screenHeight = $(window).height();
        let active = $(".menu .active").offset().top;
        if(active > screenHeight*0.8 ){
            $(".aside-menu").animate({
                scrollTop:active
            },1000)
        }
    }
})

$(".link").each(function (index) {
    let selected = $(this).attr("href");
    if(selected == currentUrlArr[0]){
        $(this).addClass("active");
    }
})

$(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");


//toast control
$('.toast').toast('show')




//maximize
$(".btn-maximize").click(function () {
    let current = $(this).closest(".card");
    if(current.hasClass("card-full-screen")){
        current.removeClass("card-full-screen");
        $(this).html(`<i class="fas fa-expand-alt fa-fw"></i>`);

    }else{
        current.addClass("card-full-screen");
        $(this).html(`<i class="fas fa-compress-alt fa-fw"></i>`);

    }
});


//mobile menu
$(".aside-menu-open").click(function () {

    $(".aside-menu").animate({marginLeft:"0"});
});
$(".aside-menu-close").click(function () {
    $(".aside-menu").animate({marginLeft:"-100%"});
});


$(window).on("load",function () {
    $(".loader").fadeOut(500,function () {
        $(".page-content").fadeIn(500);
    });
})

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// select option search
$(document).ready(function() {
    $('.select2').select2();
});

// multiple image upload
$('.input-images-1').imageUploader();

function logout(){
    event.preventDefault();document.getElementById('logout-form').submit();
}


