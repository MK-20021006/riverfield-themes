jQuery(function ($) {
$(function () {
$('.slider-news').slick({
 slidesToShow: 3,
 speed: 500,
 slidesToScroll: 1,
 autoplay:true,
 dots: true,
 arrows: false,
  responsive: [
  {
  breakpoint: 650,
  settings: {
  slidesToShow: 1,
   },
  },
  ],
});
});
});

jQuery(function ($) {
$(function () {
 $('.slider-service').slick({
	slidesToShow: 1,
	speed: 1000,
	slidesToScroll: 1,
	autoplay:true,
	fade: true,
	dots: true,
	arrows: false,
 });
});
});

jQuery(function ($) {
$(function () {
 $('.slider-sdgs').slick({
	slidesToShow: 1,
	speed: 1000,
	slidesToScroll: 1,
	autoplay:true,
	autoplaySpeed: 1500,
	fade: true,
	dots: false,
	arrows: false,
 });
});
});

jQuery(function($){
var movie = document.getElementById("movie");
movie.controls = false;
});

jQuery(function ($) {
$(function () {
$('.works-case-slide').slick({
 slidesToShow: 1,
 speed: 500,
 slidesToScroll: 1,
 autoplay:true,
 dots: false,
 arrows: false,
  responsive: [
  {
  breakpoint: 650,
  settings: {
  slidesToShow: 1,
   },
  },
  ],
});
});
});

jQuery(function ($) {
$(function () {
$('.slider-mnbldg').slick({
 slidesToShow: 1,
 speed: 500,
 slidesToScroll: 1,
 autoplay:true,
 dots: false,
 arrows: false,
});
});
});

jQuery(function ($) {
$(function () {
$('.casestudy-slider').slick({
 slidesToShow: 3,
 speed: 500,
 slidesToScroll: 1,
 autoplay:true,
 dots: false,
 arrows: false,
  responsive: [
  {
  breakpoint: 650,
  settings: {
  slidesToShow: 1,
   },
  },
  ],
});
});
});

jQuery(function ($) {
$(function () {
$('.plant-case-slider').slick({
    autoplay: true,//自動的に動き出す
    infinite: true,//スライドをループ
    speed: 500,//初期値 300
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,//要素を中央ぞろえにする
    variableWidth: true,//幅の違う画像の高さを揃えて表示
	dots: false,
	arrows: false,
	  responsive: [
	  {
	  breakpoint: 750,
	  settings: {
	  slidesToShow: 1,
	   },
	  },
	  ],
	});
	});
});


jQuery(function ($) {
$(function(){
   $(window).on('load scroll', function() {
      var winScroll = $(window).scrollTop();
      var winHeight = $(window).height();
      var scrollPos = winScroll + (winHeight * 0.8);
   $(".view").each(function() {
    if($(this).offset().top < scrollPos) {
     $(this).css({opacity: 1, transform: 'translate(0, 0)'});
     }
    });
  });
});
});

jQuery(function($){
$(window).on('scroll',function(){
	$(".lineAnimation").each(function(){
				let position = $(this).offset().top;
				let scroll = $(window).scrollTop();
				let windowHeight = $(window).height();
				if (scroll > position - windowHeight + 250){
			$(this).addClass('isActive');
			}
		});
	});
});


jQuery(function($){
  $(function() {
    $('.tab-item').click(function() {
      var index = $('.tab-item').index(this);
      $('.active').removeClass('active');
      $(this).addClass('active');
      $('.content-item').removeClass('show').eq(index).addClass('show');
    });
  });
});

//archive-works.php
jQuery(function($) {
    $(function(){
        //Behavior when tab is clicked
        $('.tab li').click(function(){
            //Get the index of the clicked tab
            var index = $('.tab li').index(this);
 
            $('.list .inner').hide().removeClass('active');
            $('.list .inner').eq(index).fadeIn().addClass('active');
 
            $('.tab li').removeClass('active');
            $(this).addClass('active');
        });
 
        //What happens when you click the pager
        $('.tab_sub li').click(function(){
            //Get index of clicked pager
            var index = $('.inner.active .tab_sub li').index(this);
 
            $('.inner.active .tab_sub li').removeClass('active');
            $(this).addClass('active');
 
            //table operation
            $('.inner.active table').hide().removeClass('active');
            $('.inner.active table').eq(index).fadeIn().addClass('active');
        });
    });
});

//side button stick out
jQuery(function($) {
$(function() {
      $('#slideR').hover(
      function(){
        $(this).animate({'marginRight':'140px'},500);
      },
      function () {
        $(this).animate({'marginRight':'0'},500);
      }
    );
});
$(function() {
      $('#slideR2').hover(
      function(){
        $(this).animate({'marginRight':'140px'},500);
      },
      function () {
        $(this).animate({'marginRight':'0'},500);
      }
    );
});
});

//hamburger menu
jQuery(function($) {
  $(function() {
    $('#js-hamburger-menu, .navigation__link').on('click', function() {
      $('.navigation').slideToggle(500)
      $('.hamburger-menu').toggleClass('hamburger-menu--open')
    });

    $('.drow-parent').on('click', function(event) {
      event.stopPropagation();
      $(this).toggleClass('active');
      $(this).find('.drow-menu').slideToggle(500);
    });
  });
});

//Header fixed follow
jQuery(function($) {
  $(function() {
    var nav = $('.site-header');
    // Position of site-header 
    var navTop = nav.offset().top + 70; // Add offset down 70px

    // Run on every scroll
    $(window).scroll(function() {
      var winTop = $(this).scrollTop();
      // Add class fixed if scroll position is below site-header
      if (winTop >= navTop) {
        nav.addClass('fixed');
      } else if (winTop <= navTop) {
        nav.removeClass('fixed');
      }
    });
  });
});

//RWD Image Maps
jQuery(function($) {
$(function(){
  $('img[usemap]').rwdImageMaps();
});

$(function(){
  $('.okayama-area').hover(
    function() {
      $('.okayama').css({
        'opacity': 1,
	    'transition': 'all .8s'
      });
    },
   function() { 
	   $('.okayama').blur().css({
        'opacity': 0.3,
		'transition': 'all 5.25s ease-out'
      }); }
  )
});
$(function(){
  $('.fukui-area').hover(
    function() {
      $('.fukui').css({
        'opacity': 1,
	    'transition': 'all .8s'
      });
    },
   function() { 
	   $('.fukui').blur().css({
        'opacity': 0.3,
		'transition': 'all 5.25s ease-out'
      }); }
  )
});
$(function(){
  $('.aichi-area').hover(
    function() {
      $('.aichi').css({
        'opacity': 1,
	    'transition': 'all .8s'
      });
    },
   function() { 
	   $('.aichi').blur().css({
        'opacity': 0.3,
		'transition': 'all 5.25s ease-out'
      }); }
  )
});
$(function(){
  $('.chiba-area').hover(
    function() {
      $('.chiba').css({
        'opacity': 1,
	    'transition': 'all .8s'
      });
    },
   function() { 
	   $('.chiba').blur().css({
        'opacity': 0.3,
		'transition': 'all 5.25s ease-out',
		'background': 'all 5.25s ease-out'
      }); }
  )
});
});


//scroll guide
$(function(){
	new ScrollHint('.table_container', {
	suggestiveShadow: true,
	remainingTime: 5000,
	i18n: {
	scrollable: 'スクロールできます'
	}
	});
});







