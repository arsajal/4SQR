(function($) {
var windowWidth = $(window).width();
var windowWidth_1920 = $('.page-body-cntlr').width();

$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});

if( $('.hamburger-cntlr').length ){
  $('.hamburger-cntlr').click(function(){
    $('body').toggleClass('allWork');
  });
}

/*if(windowWidth <=991){
    if( $('ul > li.menu-item-has-children').length ){
      $('ul > li.menu-item-has-children').click(function(){
       $(this).find('.sub-menu').slideToggle(300);
       $(this).toggleClass('sub-menu-arrow');
     });
    }
}*/

$('.loding').addClass('WinHaftlodded');
if($('body.home .loding').length){
  setTimeout(function(){
   $('body.home .loding').addClass('Winlodded');
 }, 2500);    
}
if($('body:not(.home) .loding').length){
  setTimeout(function(){
   $('body:not(.home) .loding').addClass('Winlodded');
 }, 1500);    
}
/*if($('body.home .loding').length){
  var startTime = (new Date()).getTime();
  $(window).on("load", function() {
    var endTime = (new Date()).getTime();
    var millisecondsLoading = endTime - startTime;
    if (millisecondsLoading > 50) {
      $('.loding').addClass('WinHaftlodded');
    }
    if (millisecondsLoading == millisecondsLoading) {
      setTimeout(function(){
       $('.loding').addClass('Winlodded');
     }, 9500);
      
    }
  });
}*/

if($('.loding').length){
  var startTime = (new Date()).getTime();
  $(window).on("load", function() {
    var endTime = (new Date()).getTime();
    var millisecondsLoading = endTime - startTime;
    if (millisecondsLoading > 50) {
      $('.loding').addClass('WinHaftlodded');
    }
    if (millisecondsLoading == millisecondsLoading) {
      setTimeout(function(){
       $('.loding').addClass('Winlodded');
     }, 5000);
      
    }
  });
}
	
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
};
if($('.mHc6').length){
  $('.mHc6').matchHeight();
};
$(window).load(function() {
//matchHeightCol
  if($('.mHc').length){
    $('.mHc').matchHeight();
  };
  if($('.mHc1').length){
    $('.mHc1').matchHeight();
  };
  if($('.mHc2').length){
    $('.mHc2').matchHeight();
  };
  if($('.mHc3').length){
    $('.mHc3').matchHeight();
  };
  if($('.mHc4').length){
    $('.mHc4').matchHeight();
  };
  if($('.mHc5').length){
    $('.mHc5').matchHeight();
  };
  if($('.mHc6').length){
    $('.mHc6').matchHeight();
  };
});

//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}

function determineNewHeight(originalHeight, originalWidth, newWidth){
  return (originalHeight / originalWidth) * newWidth;
}
function bgHeight(){
  $('.bg-imgH').each(function(){
    var itemWidth = $(this).width();
    var itemOH = $(this).attr('data-height');
    var itemOW = $(this).attr('data-width');
    var nHeight = determineNewHeight(itemOH, itemOW, itemWidth);
    $(this).css('height', nHeight);
  });
}
bgHeight();
$(window).resize(function(){
  bgHeight();
});

/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}

/* slider custom prev and next control */
var responsiveSlider = $('.responsive-slider-cntlr').length;
if( windowWidth > 0 && responsiveSlider < 2 ){
    $('.mbc-team-slider-ctlr .mbc-slider-prev-nxt').hide();
}else if( windowWidth > 639 && responsiveSlider < 3 ){
    $('.mbc-team-slider-ctlr .mbc-slider-prev-nxt').hide();
}else if( windowWidth > 991 && responsiveSlider < 4 ){
    $('.mbc-team-slider-ctlr .mbc-slider-prev-nxt').hide();
}else if( windowWidth > 1199 && responsiveSlider < 5 ){
    $('.mbc-team-slider-ctlr .mbc-slider-prev-nxt').hide();
}else{

}





/* BS form Validator*/
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


/* innerpage buttons */
$(".dft-fl-btn" ).each(function( index ) {
  var color = $(this).data('color');
  var bg = $(this).data('bg');
  var border = $(this).data('border');
  $(this).css('color', color);
  $(this).css('background', bg);
  $(this).css('border-color', border);
  $(this).on('mouseenter', function(){
    if( bg != ''){
      $(this).css('background', 'transparent');
      $(this).css('color', bg);
    }
    if( bg == ''){
      $(this).css('background', border);
      $(this).css('color', '#fff');
    }
  });
  $(this).on('mouseleave', function(){
    if( bg != ''){
      $(this).css('background', bg);
      $(this).css('color', color);
    }
    if( bg == ''){
      $(this).css('background', 'transparent');
      $(this).css('color', border);
    }
  });
});


var windowHeight = $(window).height();
if(windowWidth <= 767 & windowHeight > 400){
  var windowHeight = $(window).height();
  var headerHeight = $('.header').outerHeight();
  var footerHeight = $('.footer-wrp').outerHeight();
  var hdrftrHeight = (headerHeight + footerHeight);
  var bnrHeight = (windowHeight - hdrftrHeight);
  $('.home-slider-img-cntlr').css('height', bnrHeight);

  $(window).resize(function(){
    var windowHeight = $(window).height();
    var headerHeight = $('.header').height();
    var footerHeight = $('.footer-wrp').height();
    var hdrftrHeight = (headerHeight + footerHeight);
    var bnrHeight = (windowHeight - hdrftrHeight);
    $('.home-slider-img-cntlr').css('height', bnrHeight);
  });
}

$('.ClientSlider.marquee').slick({
    speed: 8000,
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: false,
    cssEase: 'linear',
    slidesToShow: 1,
    draggable:false,
    focusOnSelect:false,
    pauseOnFocus:false,
    pauseOnHover:false,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false
  });
  $('.ClientSlider2.marquee').slick({
    speed: 2000,
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: false,
    cssEase: 'linear',
    slidesToShow: 1,
    draggable:false,
    focusOnSelect:false,
    pauseOnFocus:false,
    pauseOnHover:false,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false,
    rtl:true
  });

if(windowWidth > 767){
  if( $('.fullWidthSlider').length ){
    $('.fullWidthSlider').slick({
      dots: false,
      arrows: true,
      infinite: false,
      speed: 300,
      slidesToShow: 1,
      variableWidth: true
    });
  }
  /*$('.fullWidthSlider').click(function() {
    $(this).slick('slickGoTo', parseInt($slideshow.slick('slickCurrentSlide'))+1);
  });*/
}

$(window).load(function() {
  $(".loader").delay(2000).fadeOut("slow");
})


if (windowWidth >= 768) {
  var windowHeight = $(window).height();
  var headerHeight = $('.header').height();
  var bnrHeight = (windowHeight - headerHeight);
  $('.home-slider-img-cntlr').css('height', bnrHeight);

  $(window).resize(function(){
    var windowHeight = $(window).height();
    var headerHeight = $('.header').height();
    var bnrHeight = (windowHeight - headerHeight);
    $('.home-slider-img-cntlr').css('height', bnrHeight);
  });
}

if( $('.homeSlider').length ){
    $('.homeSlider').slick({
      dots: false,
      arrows: false,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 1200,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      pauseOnHover:false
    });
}


if( $('.ptg-msnry-grds').length ){
  $('.ptg-msnry-grds').masonry({
    itemSelector: '.ptg-msnry-grd-item-col',
  }).masonry('layout');
};




new WOW().init();

})(jQuery);