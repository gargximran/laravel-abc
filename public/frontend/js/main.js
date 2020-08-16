//mega menu mob
$(document).ready(function() {
    $(".show-mega-menu").click(function() {
        var megaMenu = $(this).attr("id");

        if (megaMenu != "all") {
            $("." + megaMenu).slideToggle();
            $(document).click(function(divclose) {
                if (
                    $(divclose.target).closest(".show-mega-menu").length == 0 &&
                    $(divclose.target).closest(".megamenu").length == 0
                ) {
                    $(".megamenu").slideUp();
                }
            });
        }
    });
});

//header http request
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

//email subscriber ajax
$("#createSubscribers").submit(function(e) {
    e.preventDefault();

    let formData = {
        email: $('#createSubscribers input[name="email"]').val()
    };

    $.ajax({
        type: "POST",
        url: "/subscribers/create",
        data: formData,
        success: function(data) {
            swal("Thank you!", "Email Subscription Complete!", "success");
            
        }
    });
});

//message ajax code
$("#createMessage").submit(function(e){
    e.preventDefault();

    let messageData = {
        name        : $('#createMessage input[name="name"]').val(),
        email       : $('#createMessage input[name="email"]').val(),
        website     : $('#createMessage input[name="website"]').val(),
        message     : $('#createMessage textarea[name="message"]').val(),
    }
    $.ajax({
        type: "POST",
        url: "/message/create",
        data: messageData,
        success: function(){
            swal("Thank your!", "Your message send", "success");
        }
    })
})

//gallery slide show start
$(document).ready(function() {
    $(".show-gallery-popup").click(function() {
        $(".gallery-slideshow").fadeIn();

        var galleryPopup = $(this).attr("id");
        if (galleryPopup != "all") {
            $("." + galleryPopup).css({
                display: "block"
            });
            $("html,body").css({
                overflow: "hidden"
            });
            $("." + galleryPopup).addClass("active");
            $(document).click(function(divclose) {
                if (
                    $(divclose.target).closest(".gallery-popup-image").length ==
                        0 &&
                    $(divclose.target).closest(".show-gallery-popup").length ==
                        0 &&
                    $(divclose.target).closest(".slideshow-button").length == 0
                ) {
                    $(".gallery-slideshow").hide();
                    $(".gallery-popup-image").css({
                        display: "none"
                    });
                    $("html,body").css({
                        overflow: "auto"
                    });
                    $("." + galleryPopup).removeClass("active");
                }
            });
        }
    });
});

//slideshow
var stopSlideShow = false;
function slideshow(caller) {
    var status = $(caller).attr("value");

    if (status.indexOf("Start") > -1) {
        stopSlideShow = false;
        $(caller).attr("value", "Stop Slideshow");
    } else {
        stopSlideShow = true;
        $(caller).attr("value", "Start Slideshow");
    }

    var interval = setInterval(function() {
        if (!stopSlideShow) {
            changeSlide("next");
        } else {
            clearInterval(interval);
        }
    }, 2000);
}

//category dropdown
$(document).ready(function(){
    $(".show-child-cat").click(function(){
        var showChildCat = $(this).attr('id');
        if( showChildCat != 'all' ){
            $('.' + showChildCat ).slideToggle();
        }
    })
})




//change slide
function changeSlide(direction) {
    var currentImage = $(".active");
    var nextImage = currentImage.next();
    var prevImage = currentImage.prev();
    if (direction == "next") {
        if (nextImage.length) {
            nextImage.addClass("active");
        } else {
            $(".slider .gallery-popup-image")
                .first()
                .addClass("active");
        }
    } else {
        if (prevImage.length) {
            prevImage.addClass("active");
        } else {
            $(".slider .gallery-popup-image")
                .last()
                .addClass("active");
        }
    }
    currentImage.removeClass("active");
}

// member slider
$(".member-carousel").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});

// about slider
$(".about-carousel").owlCarousel({
    loop: false,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});

//testimonial
$(".testimonial-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});

//home product
$(".home-product-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});

//navbar mob js start
$(document).ready(function() {
    $(".show-nav").click(function() {
        $(".navbar-ite-mob").slideToggle();
    });
    $(document).click(function(divclose) {
        if (
            $(divclose.target).closest(".navbar-ite-mob").length == 0 &&
            $(divclose.target).closest(".show-nav").length == 0
        ) {
            $(".navbar-ite-mob").slideUp();
        }
    });
});
//about carousel
$(".about-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});

//banner carousel
$(".banner-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});

//nav pc js
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(window).scrollTop() > 10) {
            $(".navbar-pc").css({
                background: "#f7f7f7",
                "box-shadow": "#a2abb0 0 0 3px 0px"
            });
        } else {
            $(".navbar-pc").css({
                background: "unset",
                "box-shadow": "unset"
            });
        }
    });
});

//wow js
new WOW().init();

//go to top
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(window).scrollTop() > 10) {
            $(".go-to-top").fadeIn();
        } else {
            $(".go-to-top").fadeOut();
        }
    });
});

//shop product pre loader
$(document).ready(function() {
    setTimeout(function() {
        $(".preloader").fadeOut();
    }, 1500);
});

//custom select
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
        and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName(
                        "same-as-selected"
                    );
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
  except the current select box:*/
    var x,
        y,
        i,
        xl,
        yl,
        arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i);
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

//category toggle
$(document).ready(function() {
    $(".show-category").click(function() {
        $(".cat-form").slideToggle();
        $(document).click(function(divclose) {
            if ($(divclose.target).closest(".shop-product .left").length == 0) {
                $(".cat-form").slideUp();
            }
        });
    });
});

//sticky nav mob
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(window).scrollTop() > 10) {
            $(".navbar-mob ").css({
                position: "fixed",
                top: "0",
                left: "0",
                width: "100%",
                background: "rgba(255,255,255,0.9)",
                "z-index": "15"
            });
        } else {
            $(".navbar-mob ").css({
                position: "unset",
                top: "0",
                left: "0",
                width: "100%",
                background: "rgba(255,255,255,0.9)"
            });
        }
    });
});

//product detail
$(document).ready(function() {
    $(".for-img-one").click(function() {
        $(".img-one").fadeIn();
        $(".img-two").hide();
        $(".img-three").hide();
    });
    $(".for-img-two").click(function() {
        $(".img-one").hide();
        $(".img-two").fadeIn();
        $(".img-three").hide();
    });
    $(".for-img-three").click(function() {
        $(".img-one").hide();
        $(".img-two").hide();
        $(".img-three").fadeIn();
    });
});

//zoom image

$(document).ready(function() {
    $(".block__pic").imagezoomsl({
        zoomrange: [3, 3]
    });
});

//sticky navbar shop page
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(window).scrollTop() > 10) {
            $(".shop-page-nav").css({
                position: "fixed",
                width: "100%",
                top: "0",
                left: "0"
            });
        } else {
            $(".shop-page-nav").css({
                position: "unset",
                width: "100%",
                top: "0",
                left: "0",
                background: "white"
            });
        }
    });
});
